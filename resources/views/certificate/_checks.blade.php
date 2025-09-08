<h2 class="font-bold mt-4 mb-1">{{ __('oh-dear::lang.certificate_checks') }}</h2>
<table class="w-full">
    @foreach ($certificate->certificateChecks as $check)
        <tr>
            <td class="pt-1 w-1/2">{{ $check['label'] }}</td>
            <td class="pt-1 w-1/2">
                @if ($check['passed'])
                    <svg class="bg-green-600 h-6 rounded shadow text-white" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8"><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                @else
                    <svg class="bg-red-500 h-6 rounded shadow text-white" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8"><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                @endif
            </td>
        </tr>
    @endforeach
</table>
