<div class="mb-3">
    <a href="{{ cp_route('oh-dear.index') }}" class="flex-initial flex p-1 -m-1 items-center text-xs text-grey-70 hover:text-grey-90">
        <div class="h-6 rotate-180 svg-icon using-svg">
            <svg width="24" height="24" class="align-middle">
                <path d="M10.414 7.05l4.95 4.95-4.95 4.95L9 15.534 12.536 12 9 8.464z" fill="currentColor" fill-rule="evenodd"></path>
            </svg>
        </div>
        <span>Oh Dear</span>
    </a>

    <h1 class="flex-1">{{ $slot }}</h1>
</div>