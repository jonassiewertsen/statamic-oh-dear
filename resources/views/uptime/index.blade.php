@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    <div class="mb-3">
        @include('oh-dear::partials.back')
        <h1 class="flex-1">Uptime</h1>
    </div>

    <div class="card pl-4 py-4">

        <p class="rounded border-l-4 border-green-light pl-1" style="background-color: #f0fff4;">
            <span class="inline-block items-center px-1 py-1">
                <a href="#" class="underline">jonassiewertsen.com</a> is up.
            </span>
        </p>

        <h2 class="font-bold mt-4 mb-1">Past 7 days</h2>
        <table class="w-full pt-1">
            <tr>
                <td class="w-1/4">2020-03-02</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>2020-03-01</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>2020-02-29</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>2020-02-28</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>2020-02-27</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>2020-02-26</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>2020-02-25</td>
                <td>100%</td>
            </tr>
        </table>

        <h2 class="font-bold mt-4 mb-1">Past 12 months</h2>
        <table class="w-full pt-1">
            <tr>
                <td class="w-1/4">2020-03</td>
                <td>100%</td>
            </tr>
            <tr>
                <td class="w-1/4">2020-02</td>
                <td>100%</td>
            </tr>
            <tr>
                <td class="w-1/4">2020-01</td>
                <td>100%</td>
            </tr>
        </table>

        <h2 class="font-bold mt-4 mb-1">Latest downtime periods</h2>
        <table class="w-full pt-1">
            <thead>
                <tr class="text-xs">
                    <th class="w-2/5 text-left">Started at</th>
                    <th class="w-2/5 text-left">Ended at</th>
                    <th class="w-1/5 text-left">Duration</th>
                </tr>
            </thead>
            <tr>
                <td>2020-01-10 22:27:24</td>
                <td>12020-01-10 22:29:37</td>
                <td>2m</td>
            </tr>
            <tr>
                <td>2020-01-10 22:27:24</td>
                <td>12020-01-10 22:29:37</td>
                <td>2m</td>
            </tr>
            <tr>
                <td>2020-01-10 22:27:24</td>
                <td>12020-01-10 22:29:37</td>
                <td>2m</td>
            </tr>
        </table>
    </div>
@endsection