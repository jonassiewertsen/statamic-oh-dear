@if ($uptime['enabled'] === false)
    @component('oh-dear::partials.info', ['type' => 'disabled'])
    @endcomponent
@elseif ($uptime['latest_run_result'] === 'succeeded')
    @component('oh-dear::partials.info', ['type' => 'success'])
        <a href="{{ $url["href"] }}" target="_blank" class="underline">{{ $url["name"] }}</a> {{ __('oh-dear::lang.is_up') }}.
    @endcomponent
@else
    @component('oh-dear::partials.info', ['type' => 'failed'])
        <a href="{{ $url["href"] }}" target="_blank" class="underline">{{ $url["name"] }}</a> {{ __('oh-dear::lang.is_down') }}.
    @endcomponent
@endif