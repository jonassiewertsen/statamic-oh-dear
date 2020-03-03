{{--@if ()--}}
    @component('oh-dear::partials.info', ['type' => 'success'])
        Yeah
    @endcomponent
{{--@else--}}
    @component('oh-dear::partials.info', ['type' => 'failed'])
        Nooo
    @endcomponent
{{--@endif--}}