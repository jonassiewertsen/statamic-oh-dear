@component('oh-dear::partials.card')
    <div class="flex flex-col lg:flex-row justify-between pr-3">
        <a class="mb-1 lg:mb-0" href="{{ cp_route('oh-dear.uptime') }}">
            @include('oh-dear::overview._label', [
                'check'   => $checks['uptime'],
                'message_success' => __('oh-dear::lang.uptime'),
                'message_failed' => __('oh-dear::lang.uptime'),
            ])
        </a>

        <a class="mb-1 lg:mb-0" href="{{ cp_route('oh-dear.broken-links') }}">
            @include('oh-dear::overview._label', [
                'check' => $checks['broken_links'],
                'message_success' => __('oh-dear::lang.broken_links'),
                'message_failed' => __('oh-dear::lang.broken_links'),
            ])
        </a>

        <a class="mb-1 lg:mb-0" href="{{ cp_route('oh-dear.mixed-content') }}">
            @include('oh-dear::overview._label', [
               'check'   => $checks['mixed_content'],
               'message_success' => __('oh-dear::lang.mixed_content'),
               'message_failed' => __('oh-dear::lang.mixed_content')
           ])
        </a>

        <a class="mb-1 lg:mb-0" href="{{ cp_route('oh-dear.certificate-health') }}">
            @include('oh-dear::overview._label', [
                'check'   => $checks['certificate'],
                'message_success' => __('oh-dear::lang.certificate_health'),
                'message_failed' => __('oh-dear::lang.certificate_health'),
            ])
        </a>
    </div>

    <a class="block text-grey-70 mt-1 md:mt-2 -mb-2 text-right mr-3" href="{{ cp_route('oh-dear.index') }}">
        {{ __('oh-dear::lang.show_more') }}
    </a>
@endcomponent