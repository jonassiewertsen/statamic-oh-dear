<h2 class="font-bold mt-4 mb-1">{{ __('oh-dear::lang.past_days', ['months' => 12]) }}</h2>
<table class="w-full pt-1">
    @forelse ($pastMonths as $month)
        <tr class="border-b border-white hover:border-grey-40 cursor-default">
            <td class="pt-1 w-1/4">{{ $month['datetime'] }}</td>
            <td class="pt-1">{{ $month['uptimePercentage'] }}%</td>
        </tr>
    @empty
        {{ __('oh-dear::lang.no_entries_yet') }}
    @endforelse
</table>