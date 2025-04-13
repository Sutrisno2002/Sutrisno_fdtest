@php
    $filterId = randAlpha();
@endphp
<div x-data="{ {{ $filterId }}: false }" id="{{ $filterId }}"
     class="relative inline-flex items-center bg-slate-100 text-slate-700 hover:bg-slate-200 dark:hover:bg-gray-700 dark:text-gray-300 rounded-full pl-4 pr-2 py-2 text-xs">
    {{ $slot }}

    <button x-on:click="{{ $filterId }} = ! {{ $filterId }}"
            class="rounded-full bg-slate-200 hover:bg-slate-300 dark:hover:bg-gray-800 h-4 w-4 p-0 flex justify-center items-center ml-1">
        <i class="bx bx-chevron-down text-base"></i>
    </button>

    @isset($query)
        @if ($query)
            <a class="leading-none rounded-full bg-slate-200 hover:bg-slate-300 dark:hover:bg-gray-800 h-4 w-4 p-0 flex justify-center items-center ml-1"
               href="javascrirt:void(0)" wire:click="$set('{{ $property }}', '')">
                <i class="bx bx-x text-base"></i>
            </a>
        @endif
    @endisset

    <div x-show="{{ $filterId }}" x-bind:class="{{ $filterId }} ? 'open opacity-100' : 'hidden'"
         class="absolute left-0 top-[90%] opacity-0 w-40 z-50 mt-2 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2">
        @isset($item)
            {{ $item }}
        @endisset
    </div>
</div>
