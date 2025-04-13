@php
    $dismissable = isset($dismissable) ? 'dismissable' : '';
    $attributes = $attributes->merge(['class' => 'alert ' . $dismissable]);
@endphp

<div class="{{ $attributes['class'] }}" role="alert">
    <div class="flex">
        @isset($icon)
            <div class="flex-shrink-0 me-2 mt-1">
                <i class="{{ $icon }} text-xl"></i>
            </div>
        @endisset
        <div class="ms-4">
            @isset($title)
                <h2 class="font-semibold text-xl">{{ $title }}</h2>
            @endisset
            <p class="text-sm">{{ $slot }}</p>
        </div>
    </div>

    @if ($dismissable)
        <button onclick="this.parentNode.remove()" class="dismiss">
            <i class="mgc_close_line text-md"></i>
        </button>
    @endif
</div>
