@php
    $name = $column->name;
    $sortable = $column->sortable;
@endphp
<th scope="col"
    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase {{ $name == $sort ? 'bg-light' : null }}"
    x-data="{
        name: '{{ $column->name }}',
        sort: '{{ $sort }}',
    }">
    @if ($sortable)
        <button class="flex items-center justify-between w-full uppercase whitespace-nowrap" type="button"
                x-on:click="
                sort = name;
                $dispatch('sortOrder', [sort])">
            {{ $column->label }}
            @if ($sort == $name && $order == 'asc')
                <i class="bx ms-2 bx-chevron-up bx-border-circle"></i>
            @elseif($sort == $name && $order == 'desc')
                <i class="bx ms-2 bx-chevron-down bx-border-circle"></i>
            @else
                <i class="bx ms-2 bx-filter bx-border-circle"></i>
            @endif
        </button>
    @else
        {{ $column->label }}
    @endif
</th>
