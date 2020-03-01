<div class="card mb-3">
    <header class="flex justify-between border-b pb-1">
        <h2>{{ $title }}</h2>
        <div class="flex items-center px-1 rounded leading-loose" style="background-color: #bbf5bf;">
            <span class="bg-green-light w-2 h-3 rounded-full"></span>
            <span class="ml-1">{{ $visual }}</span>
        </div>
    </header>
    <section>
        <p class="py-2">{{ $text }}</p>
        <a class="underline text-grey-70" href="{{ $link_url }}">{{ $link_text }}</a>
    </section>
</div>