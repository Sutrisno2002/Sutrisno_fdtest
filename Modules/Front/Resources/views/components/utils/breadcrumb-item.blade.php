<div class="flex items-center gap-2">
    <i class="mgc_right_line text-lg flex-shrink-0 text-slate-400 rtl:rotate-180"></i>
    <a href="{{ isset($href) ? $href : 'javascript:void(0)' }}"
       class="text-sm font-medium {{ isset($href) ? 'text-slate-500 dark:text-slate-400' : 'text-slate-700 dark:text-slate-200' }}">
        {{ $page }}
    </a>
</div>
