@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    @component('oh-dear::partials.card_header')
        Mixed Content
    @endcomponent

    @component('oh-dear::partials.card')

        @include('oh-dear::mixedContent._status')

        @if($mixedContent)
            @include('oh-dear::mixedContent._links')
        @endif

    @endcomponent
@endsection