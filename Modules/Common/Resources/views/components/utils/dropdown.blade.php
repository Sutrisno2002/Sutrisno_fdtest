@php
    $dropdownId = randAlpha();
@endphp
<div class="relative" x-data="{ {{ $dropdownId }}: false }" id="{{ $dropdownId }}">
    <button x-on:click="{{ $dropdownId }} = ! {{ $dropdownId }}" x-bind:class="{{ $dropdownId }} ? 'open' : ''"
            {{ $attributes->merge(['class' => 'inline-flex bg-slate-100 text-slate-700 hover:bg-slate-200 dark:hover:bg-gray-700 dark:text-gray-300 rounded-full p-2']) }}>
        @if (!$slot->isEmpty())
            {{ $slot }}
        @else
            <i class="bx bx-dots-vertical-rounded"></i>
        @endif
    </button>


    <div x-show="{{ $dropdownId }}" x-bind:class="{{ $dropdownId }} ? 'open right-0' : 'hidden'" style="opacity: 0;"
         x-bind:style="{{ $dropdownId }} ? 'opacity: 1' : 'opacity: 0'"
         class="w-44 min-w-[120px] p-2 shadow-md rounded-lg z-50 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 absolute">
        @isset($item)
            {{ $item }}
        @endisset
    </div>
</div>
