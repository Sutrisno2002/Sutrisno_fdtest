<button wire:ignore
        {{ $attributes->merge(['class' => 'inline-flex bg-slate-100 text-slate-700 hover:bg-slate-200 dark:hover:bg-gray-700 dark:text-gray-300 rounded-full p-2']) }}>
    @if (!$slot->isEmpty())
        {{ $slot }}
    @else
        <i class="bx bx-dots-vertical-rounded"></i>
    @endif
</button>
