@if ($type === 'success')
    <p class="rounded border-l-4 border-green-light pl-1" style="background-color: #f0fff4;">
        <span class="inline-block items-center px-1 py-1">
            {{ $text }}
        </span>
    </p>
@elseif ($type === 'failed')
    <p class="rounded bg-red-lighter border-l-4 border-red-light pl-1">
        <span class="inline-block items-center px-1 py-1">
           {{ $text }}
        </span>
    </p>
@endif