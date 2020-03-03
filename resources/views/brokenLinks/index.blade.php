@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    @component('oh-dear::partials.card_header')
        Broken Links
    @endcomponent

    @component('oh-dear::partials.card')

        @include('oh-dear::brokenLinks._status')

    @endcomponent
@endsection