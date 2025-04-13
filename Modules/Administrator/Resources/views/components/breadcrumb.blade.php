<div class="flex justify-between items-center mb-6">
    <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">{{ $title }}</h4>
    <div class="md:flex hidden items-center gap-2.5 text-sm font-semibold">
        <div class="flex items-center gap-2">
            <a href="{{ route('administrator.index') }}" class="text-lg font-medium text-slate-500 dark:text-slate-400">
                <i class="mgc_home_3_line"></i>
            </a>
        </div>

        {{ $slot }}
    </div>
</div>
