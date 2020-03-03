@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    @component('oh-dear::partials.card_header')
        {{ __('oh-dear::lang.broken_links') }}
    @endcomponent

    @component('oh-dear::partials.card')

        @include('oh-dear::brokenLinks._status')

        @if($brokenLinks)
            @include('oh-dear::brokenLinks._links')
        @endif

    @endcomponent
@endsection