<h2 class="font-bold mt-4 mb-1">Past 12 months</h2>
<table class="w-full pt-1">
    @forelse ($pastMonths as $month)
        <tr class="border-b border-white hover:border-grey-40 cursor-default">
            <td class="pt-1 w-1/4">{{ $month['datetime'] }}</td>
            <td class="pt-1">{{ $month['uptimePercentage'] }}%</td>
        </tr>
    @empty
        No entries yet
    @endforelse
</table>