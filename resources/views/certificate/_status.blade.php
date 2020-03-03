@if ($certificateCheck)
    @component('oh-dear::partials.info', ['type' => 'success'])
        {{ __('oh-dear::lang.no_certificate_problems_detected', ['url' => $url['name'] ]) }}.
    @endcomponent
@else
    @component('oh-dear::partials.info', ['type' => 'failed'])
        {{ __('oh-dear::lang.certificate_problems_detected') }}
    @endcomponent
@endif