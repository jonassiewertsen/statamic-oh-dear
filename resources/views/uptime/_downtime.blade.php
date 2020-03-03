<h2 class="font-bold mt-4 mb-1">Latest downtime periods</h2>
<table class="w-full pt-1">
    <thead>
    <tr class="text-xs">
        <th class="w-2/5 text-left pt-1">Started at</th>
        <th class="w-2/5 text-left pt-1">Ended at</th>
        <th class="w-1/5 text-left pt-1">Duration</th>
    </tr>
    </thead>
    <tbody>
    @forelse($downtimes as $downtime)
        <tr class="border-b border-white hover:border-grey-40 cursor-default">
            <td class="w-2/5 text-left font-normal pt-1">{{ $downtime['started_at'] }}</td>
            <td class="w-2/5 text-left font-normal pt-1">{{ $downtime['ended_at'] }}</td>
            <td class="w-1/5 text-left font-normal pt-1">{{ $downtime['duration'] }}m</td>
        </tr>
    @empty
        <tr>
            <td colspan="3">No downtimes detected in the past 6 month</td>
        </tr>
    @endforelse
    </tbody>
</table>