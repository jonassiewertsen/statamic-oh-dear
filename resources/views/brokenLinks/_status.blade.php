@if ($brokenLinksCheck)
    @component('oh-dear::partials.info', ['type' => 'success'])
         {{ __('oh-dear::lang.no_broken_links', ['url' => $url['name']]) }}
    @endcomponent
@else
    @component('oh-dear::partials.info', ['type' => 'failed'])
        {{ __('oh-dear::lang.broken_links_found') }}
    @endcomponent
@endif