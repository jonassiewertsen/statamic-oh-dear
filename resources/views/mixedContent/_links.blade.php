<table class="w-full pt-1 mt-3">
    <thead>
        <tr class="text-xs">
            <th class="text-left pt-1 pr-3 text-center">{{ __('oh-dear::lang.tag') }}</th>
            <th class="text-left pt-1">{{ __('oh-dear::lang.found') }}</th>
            <th class="text-left pt-1">{{ __('oh-dear::lang.mixed_content_url') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mixedContent as $content)
            <tr>
                <td class="text-left font-normal pt-1 pr-3 text-right">
                    <span class="bg-grey-10 px-2 py-1 rounded-lg shadow">
                        {{ $content->elementName }}
                    </span>
                </td>
                <td class="text-left font-normal pt-1 pr-3">
                    <a href="{{ $content->foundOnUrl }}" target="_blank">{{ $content->foundOnUrl }}</a>
                </td>
                <td class="text-left font-normal pt-1">
                    <a href="{{ $content->mixedContentUrl }}" target="_blank">{{ $content->mixedContentUrl }}</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>