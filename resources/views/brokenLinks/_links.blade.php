<table class="w-full pt-1 mt-3">
    <thead>
    <tr class="text-xs">
        <th class="w-24 text-left pt-1">{{ __('oh-dear::lang.status_code') }}</th>
        <th class="text-left pt-1">{{ __('oh-dear::lang.internal_broken_links') }}</th>
        <th class="text-left pt-1">{{ __('oh-dear::lang.found_on') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($brokenLinks as $link)
        <tr>
            <td class="text-left font-normal pt-1 pr-3 text-right">{{ $link->statusCode }}</td>
            <td class="text-left font-normal pt-1 pr-3">
                <a href="{{ $link->crawledUrl }}" target="_blank">{{ $link->crawledUrl }}</a>
            </td>
            <td class="text-left font-normal pt-1">
                <a href="{{ $link->foundOnUrl }}" target="_blank">{{ $link->foundOnUrl }}</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>