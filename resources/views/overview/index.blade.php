@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">Oh Dear</h1>
        <a href="{{ $url['href'] }}" class="flex-initial flex items-center text-xs text-grey-70 hover:text-grey-90">
            {{ $url['name'] }}
        </a>
    </div>

    @include('oh-dear::overview._uptime')
    @include('oh-dear::overview._broken_links')
    @include('oh-dear::overview._mixed_content')
    @include('oh-dear::overview._certificate')
    
@endsection