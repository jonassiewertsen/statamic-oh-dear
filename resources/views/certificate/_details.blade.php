<h2 class="font-bold mt-4 mb-1">{{ __('oh-dear::lang.certificate_details') }}</h2>
<table class="w-full">
    @foreach ($certificate->certificateDetails as $key => $name)
        <tr>
            <td class="pt-1 w-1/3">{{ $key }}</td>
            <td class="pt-1 w-2/3">{{ $name }}</td>
        </tr>
    @endforeach
</table>