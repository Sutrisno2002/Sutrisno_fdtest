    @php
        $prop = isset($property) ? $property : 'price';
        $mask = isset($mask) ? $mask : 99;
        $prefix = isset($prefix) ? $prefix : null;
        $suffix = isset($suffix) ? $suffix : null;
    @endphp
    <div x-init="value = '{{ $prefix . $value . $suffix }}'" x-data="{ value: '0' }">
        <input class="form-input text-right" {{ $attributes }}
               x-mask:dynamic="'{{ $prefix }}' + {{ $mask }} + '{{ $suffix }}'"
               :value="{{ $value }}"
               x-on:change="$wire.set('{{ $prop }}', `${$el.value.replace(/[A-Za-z% ,.]/g, '')}`)">
    </div>
