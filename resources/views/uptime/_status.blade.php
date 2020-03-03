@if ($uptime)
    @component('oh-dear::partials.info', ['type' => 'success'])
        <a href="{{ $url["href"] }}" target="_blank" class="underline">{{ $url["name"] }}</a> is up.
    @endcomponent
@else
    @component('oh-dear::partials.info', ['type' => 'failed'])
        <a href="{{ $url["href"] }}" target="_blank" class="underline">{{ $url["name"] }}</a> is down.
    @endcomponent
@endif