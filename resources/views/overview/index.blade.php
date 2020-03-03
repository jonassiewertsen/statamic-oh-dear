@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">Oh Dear</h1>
    </div>

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

    @component('oh-dear::overview._card')
        @slot('title')
            {{ __('oh-dear::lang.broken_links') }}
        @endslot
        @slot('label')
            @include('oh-dear::overview._label', [
                'success'   => $checks['broken_links'],
                'message_success' => __('oh-dear::lang.none'),
                'message_failed' => 'Site is down', // TODO: translate
            ])
        @endslot
        @slot('link_url')
            {{ cp_route('oh-dear.broken-links') }}
        @endslot
        {{ __('oh-dear::lang.broken_links_success_message', ['time' => 'something']) }}
    @endcomponent

    @component('oh-dear::overview._card')
        @slot('title')
            {{ __('oh-dear::lang.mixed_content') }}
        @endslot
        @slot('label')
            @include('oh-dear::overview._label', [
                'success'   => $checks['mixed_content'],
                'message_success' => __('oh-dear::lang.secure'),
                'message_failed' => 'Insecure', // TODO: translate
            ])
        @endslot
        @slot('link_url')
            {{ cp_route('oh-dear.mixed-content') }}
        @endslot
        {{ __('oh-dear::lang.mixed_content_success_message', ['time' => 'something']) }}
    @endcomponent

    @component('oh-dear::overview._card')
        @slot('title')
            Certificate health {{-- Translate --}}
        @endslot
        @slot('label')
            @include('oh-dear::overview._label', [
                'success'   => $checks['certificate'],
                'message_success' => __('oh-dear::lang.secure'),
                'message_failed' => 'Insecure', // TODO: translate
            ])
        @endslot
        @slot('link_url')
            {{ cp_route('oh-dear.certificate-health') }}
        @endslot
        {{ __('oh-dear::lang.certificate_health_success_message', ['time' => 'something']) }}
    @endcomponent

@endsection