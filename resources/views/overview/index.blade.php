@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">Oh Dear</h1>
    </div>

    @include('oh-dear::overview._card', [
        'title' => 'Uptime',
        'visual' => 'Site is up',
        'text' => 'Your site is up. We last checked 2 Minutes ago.',
        'link_url' => '#',
        'link_text' => 'View the latest Report',
    ])

    @include('oh-dear::overview._card', [
        'title' => 'Broken Links',
        'visual' => 'None',
        'text' => 'No broken links found. We last checked a day ago.',
        'link_url' => '#',
        'link_text' => 'View the latest Report',
    ])

    @include('oh-dear::overview._card', [
        'title' => 'Mixed Content',
        'visual' => 'Secure',
        'text' => 'No mixed content found, your site is secure. We last checked a day ago.',
        'link_url' => '#',
        'link_text' => 'View the latest Report',
    ])

    @include('oh-dear::overview._card', [
        'title' => 'Certificate health',
        'visual' => 'Healty',
        'text' => 'Your certificate is healthy. We last checked a minute ago.',
        'link_url' => '#',
        'link_text' => 'View the latest Report',
    ])


@endsection