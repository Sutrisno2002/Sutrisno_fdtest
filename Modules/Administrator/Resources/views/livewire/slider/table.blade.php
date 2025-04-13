<div>
    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable sortable>
        @forelse ($datas as $slider)
            <tr wire:sortable.item="{{ $slider->id }}" wire:key="slider-{{ $slider->id }}">
                <x-common::table.td>
                    <div
                         class="inline-block w-[12rem] h-[6rem] rounded border-2 border-white dark:border-gray-700 overflow-hidden me-2">
                        <img class="object-cover object-center w-full h-full" src="{{ $slider->getThumbnail() }}"
                             alt="Slider {{ $slider->name }}">
                    </div>
                </x-common::table.td>
                <x-common::table.td>{{ $slider->name }}</x-common::table.td>
                <x-common::table.td>{{ $slider->position }}</x-common::table.td>
                <x-common::table.td>
                    <div class="cursor-pointer inline" wire:click="showOrHide('{{ $slider->id }}')">
                        {!! $slider->showBadge() !!}
                    </div>
                </x-common::table.td>
                <x-common::table.td class="">
                    <div class="flex gap-2 justify-center align-center">
                        @can('update.slider', 'web')
                            <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                               href="{{ route('administrator.slider.edit', $slider->id) }}">
                                <i class="bx bx-edit"></i>
                            </a>
                        @endcan
                        @can('delete.slider', 'web')
                            <a class="btn bg-danger/25 text-danger hover:bg-danger hover:text-white px-2"
                               href="javascript:void(0)" wire:click="$set('destroyId', '{{ $slider->id }}')"
                               x-on:click="deleteConfirm =!deleteConfirm">
                                <i class="bx bx-trash"></i>
                            </a>
                        @endcan
                        @can('update.slider', 'web')
                            <button type="button"
                                    class="btn px-2 py-0 text-xs bg-dark cursor-grab active:cursor-grabbing text-white"
                                    wire:sortable.handle title="Tahan untuk memindahkan posisi">
                                <i class="bx bx-sort-alt-2"></i>
                            </button>
                        @endcan
                    </div>
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
