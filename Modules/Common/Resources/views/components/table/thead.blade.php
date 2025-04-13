<thead class="bg-gray-50 dark:bg-gray-700" x-data="{
    sort: '{{ $sort }}',
    order: '{{ $order }}',
}">
    <tr>
        @foreach ($columns as $column)
            <x-common::table.th :sort="$sort" :order="$order" :column="$column" />
        @endforeach
    </tr>
</thead>
