<div x-data="{ deleteConfirm: false }">
    {{-- @if (session()->has('success'))
        <x-common::utils.alert class="primary mb-3" icon="bx bx-check-circle" title="Sukses!" dismissable>
            {{ session()->get('success') }}
        </x-common::utils.alert>
    @endif

    @if (session()->has('error'))
        <x-common::utils.alert class="warning mb-3" icon="bx bx-info-circle" title="Upss.. Tampaknya ada yang salah"
            dismissable>
            {{ session()->get('error') }}
        </x-common::utils.alert>
    @endif --}}


    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>
        @forelse ($datas as $data)
            <tr>
                <x-common::table.td>{{ $data->title }}</x-common::table.td>
                <x-common::table.td>{{ $data->short_description }}</x-common::table.td>
                <x-common::table.td>{!! $data->activeBadge() !!}</x-common::table.td>
                <x-common::table.td>{{ dateTimeTranslated($data->created_at) }}</x-common::table.td>
                <x-common::table.td>
                    <x-common::utils.dropdown>
                        <x-slot name="item">

                            @can('publish.page', 'web')
                                <x-common::utils.dropdown-item 
                                    wire:click="archive('{{ $data->id }}')">
                                    <i class="w-4 h-4 me-3 bx bx-{{ $data->is_active == true ? 'archive-in' : 'upload' }}"></i>
                                    {{ $data->is_active == true ? 'Non Aktifkan' : 'Aktifkan' }}
                                </x-common::utils.dropdown-item>
                            @endcan

                            @can('update.page', 'web')
                                <x-common::utils.dropdown-item href="{{ route('administrator.page.edit', $data->id) }}">
                                    <i class="w-4 h-4 me-3 bx bx-edit"></i>
                                    Edit
                                </x-common::utils.dropdown-item>
                            @endcan

                            @can('delete.page', 'web')
                                <x-common::utils.dropdown-item
                                    wire:click="$set('destroyId', '{{ $data->id }}')"
                                    x-on:click="deleteConfirm =!deleteConfirm">
                                    <i class="w-4 h-4 me-3 bx bx-trash"></i>
                                    Hapus
                                </x-common::utils.dropdown-item>
                            @endcan
                        </x-slot>
                    </x-common::utils.dropdown>
                </x-common::table.td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($table->columns) }}" class="px-4 py-4 text-center">
                    Data yang kamu cari tidak kami temukan.
                </td>
            </tr>
        @endforelse
    </x-common::table.table>

    <x-common::utils.remove-modal />
</div>
