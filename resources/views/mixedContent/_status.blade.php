@if ($mixedContentCheck['latest_run_result'] === 'succeeded')
    @component('oh-dear::partials.info', ['type' => 'success'])
        No mixed content found on {{ $url['name'] }}
    @endcomponent
@else
    @component('oh-dear::partials.info', ['type' => 'failed'])
        Mixed content found!
    @endcomponent
@endif