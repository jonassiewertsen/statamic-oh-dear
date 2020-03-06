@extends('statamic::layout')
@section('title', 'Problem - Oh Dear')

@section('content')
    @component('oh-dear::partials.card_header')
        {{ __('oh-dear::lang.ups') }}
    @endcomponent

    @component('oh-dear::partials.card')

        {{ __('oh-dear::lang.probem_occurred') }}

    @endcomponent
@endsection