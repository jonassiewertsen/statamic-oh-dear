@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">Oh Dear</h1>
    </div>

    @include('oh-dear::overview._card', [
        'title' => __('oh-dear::lang.uptime'),
        'visual' => __('oh-dear::lang.site_up'),
        'text' => 'Your site is up. We last checked 2 Minutes ago.',
        'link_url' => '#',
        'link_text' => __('oh-dear::lang.view_latest_report'),
    ])

    @include('oh-dear::overview._card', [
        'title' => __('oh-dear::lang.broken_links'),
        'visual' => __('oh-dear::lang.none'),
        'text' => 'No broken links found. We last checked a day ago.',
        'link_url' => '#',
        'link_text' => __('oh-dear::lang.view_latest_report'),
    ])

    @include('oh-dear::overview._card', [
        'title' => __('oh-dear::lang.mixed_content'),
        'visual' => __('oh-dear::lang.secure'),
        'text' => 'No mixed content found, your site is secure. We last checked a day ago.',
        'link_url' => '#',
        'link_text' => __('oh-dear::lang.view_latest_report'),
    ])

    @include('oh-dear::overview._card', [
        'title' => 'Certificate health',
        'visual' => __('oh-dear::lang.healthy'),
        'text' => 'Your certificate is healthy. We last checked a minute ago.',
        'link_url' => '#',
        'link_text' => __('oh-dear::lang.view_latest_report'),
    ])

@endsection