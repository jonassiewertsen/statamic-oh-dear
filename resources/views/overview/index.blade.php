@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">Oh Dear</h1>
    </div>

    <div class="card">
        @foreach($checks as $check)
            {{ $check->type }}: {{ $check->latestRunResult }}<br>
        @endforeach
    </div>
@endsection