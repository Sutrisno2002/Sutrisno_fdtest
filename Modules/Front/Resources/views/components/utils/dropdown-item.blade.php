<div>
    @php
        $href = isset($href) ? $href : 'javascript:(0)';
    @endphp
    <a class="flex items-center py-2 px-4 text-sm rounded text-gray-500  hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
       href="{{ $href }}" {{ $attributes }}>
        {{ $slot }}
    </a>
</div>
