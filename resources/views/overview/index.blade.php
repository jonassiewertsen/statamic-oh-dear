@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">Oh Dear</h1>
    </div>

    @include('oh-dear::overview._card', [
        'title'     => __('oh-dear::lang.uptime'),
        'visual'    => __('oh-dear::lang.site_up'),
        'text'      => __('oh-dear::lang.uptime_success_message', ['time' => 'something']),
        'link_url'  => '#',
        'link_text' => __('oh-dear::lang.view_latest_report'),
    ])

    @include('oh-dear::overview._card', [
        'title'     => __('oh-dear::lang.broken_links'),
        'visual'    => __('oh-dear::lang.none'),
        'text'      => __('oh-dear::lang.broken_links_success_message', ['time' => 'something']),
        'link_url'  => '#',
        'link_text' => __('oh-dear::lang.view_latest_report'),
    ])

    @include('oh-dear::overview._card', [
        'title'     => __('oh-dear::lang.mixed_content'),
        'visual'    => __('oh-dear::lang.secure'),
        'text'      => __('oh-dear::lang.mixed_content_success_message', ['time' => 'something']),
        'link_url'  => '#',
        'link_text' => __('oh-dear::lang.view_latest_report'),
    ])

    @include('oh-dear::overview._card', [
        'title'     => 'Certificate health',
        'visual'    => __('oh-dear::lang.healthy'),
        'text'      => __('oh-dear::lang.certificate_health_success_message', ['time' => 'something']),
        'link_url'  => '#',
        'link_text' => __('oh-dear::lang.view_latest_report'),
    ])

@endsection