<div class="card mb-3">
    <header class="flex justify-between border-b pb-1">
        <h2>{{ $title }}</h2>
       {{ $label }}
    </header>
    <section>
        <p class="py-2">{{ $slot }}</p>
        <a class="underline text-grey-70" href="{{ $link_url }}">
            {{ __('oh-dear::lang.view_latest_report') }}
        </a>
    </section>
</div>