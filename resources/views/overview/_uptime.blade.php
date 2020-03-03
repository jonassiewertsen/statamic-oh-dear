@component('oh-dear::overview._card')
    @slot('title')
        {{ __('oh-dear::lang.uptime') }}
    @endslot
    @slot('label')
        @include('oh-dear::overview._label', [
            'success'   => $checks['uptime'],
            'message_success' => 'Site is up', // TODO translate
            'message_failed' => 'Site is down',
        ])
    @endslot
    @slot('link_url')
        {{ cp_route('oh-dear.uptime') }}
    @endslot
    {{ __('oh-dear::lang.uptime_success_message', ['time' => 'something']) }}
@endcomponent