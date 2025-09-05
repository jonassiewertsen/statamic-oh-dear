<?php

namespace Jonassiewertsen\OhDear;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Jonassiewertsen\OhDear\Exceptions\OhDearCredentialsNotProvidedException;
use OhDear\PhpSdk\Dto\CertificateHealth;
use OhDear\PhpSdk\Enums\UptimeSplit;
use OhDear\PhpSdk\OhDear as OhDearSDK;

class OhDear
{
    public null|OhDearSDK $ohDear;
    public \OhDear\PhpSdk\Dto\Monitor $site;
    private null|string $apiKey;
    private string $siteId;

    /**
     * Instanciate OhDear
     * @throws OhDearCredentialsNotProvidedException
     */
    public function __construct()
    {
        $this->apiKey = config('oh-dear.api_key');
        $this->siteId = config('oh-dear.site_id');

        // Throw an exception, in case the API key or site id have not been provided
        // In case you do wonder: They should be in your .env file
        if ($this->apiKey === null || $this->siteId === null) {
            throw new OhDearCredentialsNotProvidedException;
        }

        try {
            $this->ohDear = new OhDearSDK($this->apiKey);
            $this->site   = $this->ohDear->monitor($this->siteId);
        } catch (\Exception $e) {
            // Setting values to null, in case something goes wrong.
            $this->ohDear = null;
            $this->site   = null;
        }
    }

    /**
     * Uptime records in the specific time frame
     *
     * @param Carbon $start
     * @param Carbon $end
     * @param UptimeSplit $split
     * @return Collection
     */
    public function uptime(Carbon $start, Carbon $end, UptimeSplit $split): Collection
    {
        $uptime = $this->ohDear->uptime(
            $this->siteId,
            $start->format('Y-m-d H:i:s'),
            $end->format('Y-m-d H:i:s'),
            $split
        );

        $uptime = collect($uptime);

        return $uptime->transform(function ($entry) {
            // formatting the datetime
            $datetime = Carbon::parse($entry->datetime)->format('Y-m-d');

            return [
                'datetime'         => $datetime,
                'uptimePercentage' => $entry->uptimePercentage,
            ];
        });
    }

    /**
     * Downtime records in the specific time frame
     *
     * @param Carbon $start
     * @param Carbon $end
     * @return Collection
     */
    public function downtime(Carbon $start, Carbon $end): Collection
    {
        $downtime = $this->ohDear->downtime(
            $this->siteId,
            $start->format('Y-m-d H:i:s'),
            $end->format('Y-m-d H:i:s')
        );

        $downtime = collect($downtime);

        return $downtime->transform(function ($downtime) {
            $startedAt = Carbon::parse($downtime->startedAt);
            $endedAt   = Carbon::parse($downtime->endedAt);
            $duration  = $startedAt->diffInMinutes($endedAt);

            return [
                'started_at' => $downtime->startedAt,
                'ended_at'   => $downtime->endedAt,
                'duration'   => $duration,
            ];
        });
    }

    /**
     * Broken links records
     *
     * @return iterable
     */
    public function brokenLinks(): iterable
    {
        return $this->ohDear->brokenLinks($this->siteId);
    }

    /**
     * Mixed content records
     *
     * @return array
     */
    public function mixedContent(): array
    {
        return $this->ohDear->mixedContent($this->siteId);
    }

    /**
     * Certificate records
     *
     * @return CertificateHealth
     */
    public function certificate(): CertificateHealth
    {
        return $this->ohDear->certificateHealth($this->siteId);
    }

    /**
     * URL information from the chosen OhDear Site
     *
     * @return array
     */
    public function url(): array
    {
        return [
            'name' => $this->site->sortUrl,
            'href' => $this->site->url,
        ];
    }

    /**
     * The OhDear Checks
     *
     * @return array|\OhDear\PhpSdk\Resources\Check[]
     */
    public function checks()
    {
        return $this->site->checks;
    }

    /**
     * Only the uptime check
     *
     * @return array
     */
    public function uptimeCheck(): array
    {
        $uptime = collect($this->site->checks)
            ->where('type', 'uptime');

        return $this->addLastRun($uptime->first());
    }

    /**
     * Only the broken links check
     *
     * @return array
     */
    public function brokenLinksCheck(): array
    {
        $links = collect($this->site->checks)
            ->where('type', 'broken_links');

        return $this->addLastRun($links->first());
    }

    /**
     * Only the mixed content check
     *
     * @return array
     */
    public function mixedContentCheck(): array
    {
        $contents = collect($this->site->checks)
            ->where('type', 'mixed_content');

        return $this->addLastRun($contents->first());
    }

    /**
     * Only the certificate health check
     *
     * @return array
     */
    public function certificateCheck(): array
    {
        $certificate = collect($this->site->checks)
            ->where('type', 'certificate_health');

        return $this->addLastRun($certificate->first());
    }

    /**
     * Start the maintenance window
     *
     * @return void
     */
    public function startMaintenance(): void
    {
        $this->ohDear->startMaintenancePeriod($this->siteId);
    }

    /**
     * Stop the maintenance window
     *
     * @return void
     */
    public function stopMaintenance(): void
    {
        $this->ohDear->stopMaintenancePeriod($this->siteId);
    }

    /**
     * Adding the last run in diff for human string
     *
     * @param array $attributes
     * @return array
     */
    private function addLastRun(array $attributes): array
    {
        return array_merge(
            $attributes,
            ['latest_run' => Carbon::parse($attributes['latest_run_ended_at'])->diffForHumans()]
        );
    }
}
