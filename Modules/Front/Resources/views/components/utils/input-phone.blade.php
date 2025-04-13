<div class="w-full">
    @php
        $prop = isset($property) ? $property : 'phone';
    @endphp
    <input {{ $attributes->merge(['class' => 'form-input']) }} {{ $attributes }} x-mask="999-9999-99999"
           x-value="{{ $value }}"
           x-on:change="$wire.set('{{ $prop }}', `${$el.value.
            {{-- substr(4). --}}
            replace(/[- ]/g, '')}`)">
</div>
