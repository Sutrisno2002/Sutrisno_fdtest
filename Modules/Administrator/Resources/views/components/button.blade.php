@php
    $attributes = $attributes->merge(['class' => '']);
@endphp

@isset($disabled)
    @if ($disabled == 'true')
        <div {{ $attributes->merge(['class' => 'disabled']) }}>
            {{ $slot }}
        </div>
    @else
        <button class="{{ $attributes['class'] }}" @isset($type) type="{{ $type }}" @endisset>
            {{ $slot }}
            @isset($loading)
                @isset($target)
                    <div class="animate-spin inline-block ms-1 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full"
                         role="status" aria-label="loading" wire:loading wire:target="{{ $target }}">
                        <span class="sr-only">Loading...</span>
                    </div>
                @endisset
            @endisset
        </button>
    @endif
@else
    <button class="{{ $attributes['class'] }}" @isset($type) type="{{ $type }}" @endisset>
        {{ $slot }}
        @isset($loading)
            @isset($target)
                <div class="animate-spin inline-block ms-1 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full"
                     role="status" aria-label="loading" wire:loading wire:target="{{ $target }}">
                    <span class="sr-only">Loading...</span>
                </div>
            @endisset
        @endisset
    </button>
@endisset
