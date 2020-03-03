@component('oh-dear::overview._card')
    @slot('title')
        {{ __('oh-dear::lang.mixed_content') }}
    @endslot
    @slot('label')
        @include('oh-dear::overview._label', [
            'success'   => $checks['mixed_content'],
            'message_success' => __('oh-dear::lang.secure'),
            'message_failed' => __('oh-dear::lang.insecure')
        ])
    @endslot
    @slot('link_url')
        {{ cp_route('oh-dear.mixed-content') }}
    @endslot
    {{ __('oh-dear::lang.mixed_content_success_message', ['time' => 'something']) }}
@endcomponent