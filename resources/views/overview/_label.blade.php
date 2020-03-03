@if ($success)
    <div class="flex items-center px-1 rounded leading-loose" style="background-color: #bbf5bf;">
        <span class="bg-green-light w-2 h-3 rounded-full"></span>
        <span class="ml-1">{{ $message_success }}</span>
    </div>
@else
    <div class="flex items-center px-1 rounded leading-loose bg-red-lighter">
        <span class="bg-red-light w-2 h-3 rounded-full"></span>
        <span class="ml-1">{{ $message_failed }}</span>
    </div>
@endif