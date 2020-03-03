@if ($mixedContentCheck)
    @component('oh-dear::partials.info', ['type' => 'success'])
        {{ __('oh-dear::lang.no_mixed_content_found', ['url' => $url['name']] }}
    @endcomponent
@else
    @component('oh-dear::partials.info', ['type' => 'failed'])
        {{ __('oh-dear::lang.mixed_content_found') }}
    @endcomponent
@endif