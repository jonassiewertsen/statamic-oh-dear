<?php

namespace Jonassiewertsen\OhDear;

use Illuminate\Support\Carbon;
use Jonassiewertsen\OhDear\Exceptions\OhDearCredentialsNotProvidedException;
use OhDear\PhpSdk\OhDear as OhDearSDK;

class OhDear
{
    /**
     * The Odear instance
     *
     * @var OhDearSDK
     */
    public $ohDear;

    /**
     * The specific monitored Oh Dear site
     *
     * @var \OhDear\PhpSdk\Resources\Site
     */
    public $site;

    /**
     * Instanciate OhDear
     * @throws OhDearCredentialsNotProvidedException
     */
    public function __construct()
    {
        // Throw an exception, in case the API key or site id have not been provided
        // In case you do wonder: They should be in your .env file
        if (config('oh-dear.api_key') === null || config('oh-dear.site_id') === null) {
            throw new OhDearCredentialsNotProvidedException;
        }

        try {
            $this->ohDear = new OhDearSDK(config('oh-dear.api_key'));
            $this->site   = $this->ohDear->site(config('oh-dear.site_id'));
        } catch (\Exception $e) {
            // Setting values to null, in case something goes wrong.
            $this->ohDear = null;
            $this->site   = null;
        }
    }

    /**
     * Uptime records in the specific time frame
     *
     * @param $start
     * @param $end
     * @param $split
     * @return \Illuminate\Support\Collection
     */
    public function uptime($start, $end, $split)
    {
        $uptime = $this->site->uptime(
            $start->format('YmdHis'),
            $end->format('YmdHis'),
            $split);

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
     * @param $start
     * @param $end
     * @return \Illuminate\Support\Collection
     */
    public function downtime($start, $end)
    {
        $downtime = $this->site->downtime(
            $start->format('YmdHis'),
            $end->format('YmdHis'));

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
     * @return array
     */
    public function brokenLinks()
    {
        return $this->site->brokenLinks();
    }

    /**
     * Mixed content records
     *
     * @return array
     */
    public function mixedContent()
    {
        return $this->site->mixedContent();
    }

    /**
     * Certificate records
     *
     * @return array
     */
    public function certificate()
    {
        return $this->site->certificateHealth();
    }

    /**
     * URL informations from the choosen OhDear Site
     *
     * @return array
     */
    public function url()
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
     * @return mixed
     */
    public function uptimeCheck()
    {
        $uptime = collect($this->site->checks)
            ->where('type', 'uptime');

        return $this->addLastRun($uptime->first()->attributes);
    }

    /**
     * Only the broken links check
     *
     * @return mixed
     */
    public function brokenLinksCheck()
    {
        $links = collect($this->site->checks)
            ->where('type', 'broken_links');

        return $this->addLastRun($links->first()->attributes);
    }

    /**
     * Only the mixed content check
     *
     * @return mixed
     */
    public function mixedContentCheck()
    {
        $contents = collect($this->site->checks)
            ->where('type', 'mixed_content');

        return $this->addLastRun($contents->first()->attributes);
    }

    /**
     * Only the certificate health check
     *
     * @return mixed
     */
    public function certificateCheck()
    {
        $certificate = collect($this->site->checks)
            ->where('type', 'certificate_health');

        return $this->addLastRun($certificate->first()->attributes);
    }

    /**
     * Adding the last run in diff for human string
     *
     * @param $attributes
     * @return array
     */
    private function addLastRun($attributes)
    {
        return array_merge(
            $attributes,
            ['latest_run' => Carbon::parse($attributes['latest_run_ended_at'])->diffForHumans()]
        );
    }
}
