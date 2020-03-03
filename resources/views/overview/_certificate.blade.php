@component('oh-dear::overview._card')
    @slot('title')
        Certificate health {{-- Translate --}}
    @endslot
    @slot('label')
        @include('oh-dear::overview._label', [
            'success'   => $checks['certificate'],
            'message_success' => __('oh-dear::lang.secure'),
            'message_failed' => 'Insecure', // TODO: translate
        ])
    @endslot
    @slot('link_url')
        {{ cp_route('oh-dear.certificate-health') }}
    @endslot
    {{ __('oh-dear::lang.certificate_health_success_message', ['time' => 'something']) }}
@endcomponent