<div>
    @php
        $prop = isset($property) ? $property : 'price';
        $prefix = isset($prefix) ? $prefix : 'Rp ';
    @endphp
    <input class="form-input text-right" {{ $attributes }} x-mask:dynamic="'{{ $prefix }}' + $money($input, '.')"
           x-value="{{ $value }}"
           x-on:change="$wire.set('{{ $prop }}', `${$el.value.replace(/[A-Za-z ,.]/g, '')}`)">
</div>
