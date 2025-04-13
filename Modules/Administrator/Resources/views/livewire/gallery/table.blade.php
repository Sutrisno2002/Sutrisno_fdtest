<div x-data="{deleteConfirm: false,}">
    <div>
        <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" withoutCard
            searchable>
            @forelse ($datas as $data)
                <tr>
                    <x-common::table.td>
                        <img class="w-40 rounded-md object-cover" src="{{ url($data->images->first()->path) }}" alt="">
                    </x-common::table.td>
                    <x-common::table.td>{{ $data->title }}</x-common::table.td>
                    <x-common::table.td>{{ dateTimeTranslated($data->date) }}</x-common::table.td>
                    <x-common::table.td>{{ $data->creator->name }}</x-common::table.td>
                    <x-common::table.td>
                        <x-common::utils.dropdown>
                            <x-slot name="item">
                                @can('show.gallery')
                                <x-common::utils.dropdown-item 
                                    href="{{ route('administrator.gallery.show', $data->id) }}">
                                    <i class="w-4 h-4 me-3 bx bx-log-in-circle"></i>
                                    Detail
                                </x-common::utils.dropdown-item>    
                                @endcan
                                
                                @can('update.gallery')
                                <x-common::utils.dropdown-item 
                                    href="{{ route('administrator.gallery.edit', $data->id) }}">
                                    <i class="w-4 h-4 me-3 bx bxs-eyedropper"></i>
                                    Edit
                                </x-common::utils.dropdown-item>    
                                @endcan
                                
                                @can('delete.gallery')
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
            </tr>
        </x-common::table.table>
    
    </div>    
    <x-common::utils.remove-modal />
</div>
