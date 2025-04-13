<div>
    @php
        $prop = isset($property) ? $property : 'date';
    @endphp
    <input class="form-input" x-mask="31/12/2100" placeholder="DD/MM/YYYY" value="{{ $value }}"
           x-on:change="$wire.set('{{ $prop }}', `${$el.value.replace(/[/]/g, '-')}`)">
</div>
