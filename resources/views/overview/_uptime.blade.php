@component('oh-dear::overview._card')
    @slot('title')
        {{ __('oh-dear::lang.uptime') }}
    @endslot
    @slot('label')
        @include('oh-dear::overview._label', [
            'success'   => $checks['uptime']['latest_run_result'],
            'message_success' => __('oh-dear::lang.site_up'),
            'message_failed' => __('oh-dear::lang.site_down'),
        ])
    @endslot
    @slot('link_url')
        {{ cp_route('oh-dear.uptime') }}
    @endslot
    {{ __('oh-dear::lang.uptime_success_message', ['time' => 'something']) }}
@endcomponent