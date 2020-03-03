@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    @component('oh-dear::partials.card_header')
        Certificate Health
    @endcomponent

    @component('oh-dear::partials.card')

        @include('oh-dear::certificate._status')

        @include('oh-dear::certificate._checks')
        @include('oh-dear::certificate._details')

    @endcomponent
@endsection