    @php
        $prop = isset($property) ? $property : 'price';
        $prefix = isset($prefix) ? $prefix : 'Rp ';
    @endphp
    <div x-init="value = '{{ price($value, true) }}'" x-data="{ value: '0' }">
        <input class="form-input text-right" {{ $attributes }}
               x-mask:dynamic="'{{ $prefix }}' + $money($input, '.')" :value="value"
               x-on:change="$wire.set('{{ $prop }}', `${$el.value.replace(/[A-Za-z ,.]/g, '')}`)">
    </div>
