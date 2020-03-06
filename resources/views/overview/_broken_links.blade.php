@component('oh-dear::overview._card')
    @slot('title')
        {{ __('oh-dear::lang.broken_links') }}
    @endslot
    @slot('label')
        @include('oh-dear::overview._label', [
            'check' => $checks['broken_links'],
            'message_success' => __('oh-dear::lang.none'),
            'message_failed' => __('oh-dear::lang.found'),
        ])
    @endslot
    @slot('link_url')
        {{ cp_route('oh-dear.broken-links') }}
    @endslot
    {{ __('oh-dear::lang.broken_links_success_message', ['time' => $checks['broken_links']['latest_run']]) }}
@endcomponent