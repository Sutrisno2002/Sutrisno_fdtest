<div>
    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>
        @forelse ($datas as $role)
            <tr>
                <x-common::table.td>{{ $role->guard_name }}</x-common::table.td>
                <x-common::table.td>{{ $role->name }}</x-common::table.td>
                <x-common::table.td>
                    Permissions: {{ $role->permissions_count }}
                </x-common::table.td>
                <x-common::table.td class="flex gap-2 justify-center">
                    <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                       href="{{ route('administrator.role.edit', $role->id) }}">
                        <i class="bx bx-edit"></i>
                    </a>
                    <a class="btn bg-danger/25 text-danger hover:bg-danger hover:text-white px-2"
                       href="javascript:void(0)" wire:click="$set('destroyId', '{{ $role->id }}')"
                       x-on:click="deleteConfirm =!deleteConfirm">
                        <i class="bx bx-trash"></i>
                    </a>
                </x-common::table.td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($table->columns) }}">
                    <p class="text-center p-4">
                        Data yang kamu cari, tidak kami ditemukan.
                    </p>
                </td>
            </tr>
        @endforelse
    </x-common::table.table>
</div>
