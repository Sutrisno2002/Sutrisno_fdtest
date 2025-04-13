<div x-data="{
    deleteConfirm: false,
    createModal: false,
    editModal: false
}">

    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>

        @can('create.faq', 'web')
            <x-slot name="searchAction">
                <div class="form-group mb-0">
                    @can('create.faq', 'web')
                        <button type="button" class="btn bg-primary text-white pl-3" x-on:click="createModal =!createModal;"
                                wire:click="$dispatch('initModal')">
                            <i class="bx bx-plus text-base me-3"></i> Tambah
                        </button>
                    @endcan
                </div>
            </x-slot>
        @endcan

        @forelse ($datas as $item)
            <tr>
                <x-common::table.td width="60%">
                    <div x-data="{ expanded: false }" x-on:click.outside="expanded = false">
                        @if ($item->category)
                            <small class="badge soft-dark mb-2">{{ $item->category->name }}</small> <br>
                        @endif
                        <a class="font-black font-medium {{ $item->is_active ?: 'text-muted' }}"
                           href="javascript:void(0)" x-on:click="expanded = !expanded">
                            {{ $item->question }}
                        </a>
                        <div class="max-h-[200px] overflow-auto" x-show="expanded" style="display: none" x-collapse>
                            <div class="my-3 {{ !$item->is_active ?: 'bg-white border-top border-light' }}">
                                {{ $item->answer }}
                            </div>
                        </div>
                    </div>
                </x-common::table.td>
                <x-common::table.td>
                    {!! $item->statusBadge() !!}
                </x-common::table.td>
                <x-common::table.td>
                    {!! $item->featuredBadge() !!}
                </x-common::table.td>
                <x-common::table.td class="flex gap-2 justify-center">
                    @can('update.faq')
                        <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                           href="javascript:void(0)" wire:click="edit('{{ $item->id }}')"
                           x-on:click="editModal =!editModal">
                            <i class="bx bx-edit"></i>
                        </a>
                    @endcan
                    @can('delete.faq')
                        <a class="btn bg-danger/25 text-danger hover:bg-danger hover:text-white px-2"
                           href="javascript:void(0)" wire:click="$set('destroyId', '{{ $item->id }}')"
                           x-on:click="deleteConfirm =!deleteConfirm">
                            <i class="bx bx-trash"></i>
                        </a>
                    @endcan
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

    <livewire:administrator::faq.create />
    <livewire:administrator::faq.edit />
    <x-common::utils.remove-modal />
</div>
