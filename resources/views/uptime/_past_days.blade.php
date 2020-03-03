<h2 class="font-bold mt-4 mb-1">Past 7 days</h2>
<table class="w-full">
    @forelse ($pastDays as $day)
        <tr class="border-b border-white hover:border-grey-40 cursor-default">
            <td class="pt-1 w-1/4">{{ $day['datetime'] }}</td>
            <td class="pt-1">{{ $day['uptimePercentage'] }}%</td>
        </tr>
    @empty
        No entries yet
    @endforelse
</table>