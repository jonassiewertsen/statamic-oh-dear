@if ($certificateCheck)
    @component('oh-dear::partials.info', ['type' => 'success'])
        No certificate problems detected on {{ $url['name'] }}.
    @endcomponent
@else
    @component('oh-dear::partials.info', ['type' => 'failed'])
        Certificate healt problems detected!
    @endcomponent
@endif