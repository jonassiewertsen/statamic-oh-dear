@if ($check['enabled'] === false)
    <div class="flex items-center px-1 rounded leading-loose bg-grey-20">
        <span class="bg-grey-60 w-2 h-3 rounded-full"></span>
        <span class="ml-1 text-grey-70">Disabled</span>
    </div>
@elseif ($check['latest_run_result'] === 'succeeded')
    <div class="flex items-center px-1 rounded leading-loose" style="background-color: #bbf5bf;">
        <span class="bg-green-light w-2 h-3 rounded-full"></span>
        <span class="ml-1">{{ $message_success }}</span>
    </div>
@elseif ($check['latest_run_result'] === 'failed')
    <div class="flex items-center px-1 rounded leading-loose bg-red-lighter">
        <span class="bg-red-light w-2 h-3 rounded-full"></span>
        <span class="ml-1">{{ $message_failed }}</span>
    </div>
@endif