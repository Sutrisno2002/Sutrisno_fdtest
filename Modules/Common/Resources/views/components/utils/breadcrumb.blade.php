<div class="flex flex-col justify-between md:items-center mb-6">
    <div class="flex w-full justify-between items-center">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium m-0">{{ $title }}</h4>
        <div class="flex flex-wrap gap-2.5">
            @isset($action)
                <div class="flex gap-2.5 w-full justify-end">
                    {{ $action }}
                </div>
            @endisset
        </div>
    </div>
    <div class="flex flex-wrap items-center gap-2.5 text-sm font-semibold w-full">
        <div class="flex items-center gap-2">
            <a href="{{ route('administrator.index') }}" class="text-lg font-medium text-slate-500 dark:text-slate-400">
                <i class="bx bx-home"></i>
            </a>
        </div>

        {{ $slot }}
    </div>
</div>
