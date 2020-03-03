@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    @component('oh-dear::partials.card_header')
        {{ __('oh-dear::lang.uptime') }}
    @endcomponent

    @component('oh-dear::partials.card')

        @include('oh-dear::uptime._status')

        @include('oh-dear::uptime._past_days')
        @include('oh-dear::uptime._past_months')
        @include('oh-dear::uptime._downtime')

    @endcomponent
@endsection