<h2 class="font-bold mt-4 mb-1">{{ __('oh-dear::lang.past_days', ['days' => 7]) }}</h2>
<table class="w-full">
    @forelse ($pastDays as $day)
        <tr class="border-b border-white hover:border-grey-40 cursor-default">
            <td class="pt-1 w-1/4">{{ $day['datetime'] }}</td>
            <td class="pt-1">{{ $day['uptimePercentage'] }}%</td>
        </tr>
    @empty
        {{ __('oh-dear::lang.no_entries_yet') }}
    @endforelse
</table>