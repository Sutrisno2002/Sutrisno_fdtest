<div x-data="{
    deleteConfirm: false,
    createModal: false,
    editModal: false
}">
    <div class="grid md:grid-cols-12 gap-6">
        <div class="md:col-span-7 flex flex-col gap-6">
            <div class="card p-6">
                @can('create.faq-category', 'web')
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="card-title">Daftar Kategori</h4>
                        <button type="button" class="btn bg-primary text-white pl-3" x-on:click="createModal =!createModal;"
                                wire:click="$dispatch('initModal')">
                            <i class="bx bx-plus text-base me-3"></i> Kategori
                        </button>
                    </div>
                @endcan

                <div class="input-group append w-full md:w-6/12 ms-auto mb-4">
                    <input type="text" class="form-input" id="search" name="search" wire:model.lazy="search"
                           placeholder="Pencarian...">
                    <span class="text">
                        <i class="bx bx-search"></i>
                    </span>
                </div>

                <div class="flex flex-col" wire:sortable="updateOrder" wire:sortable-group="updateCategoryOrder"
                     wire:sortable.options="{ animation: 50 }">
                    @foreach ($categories as $group)
                        <div wire:sortable.item="{{ $group->id }}" wire:key="group-{{ $group->id }}"
                             x-data="{ expanded: false }" title="{{ !$group->status ? 'Kategori Non-aktif' : null }}"
                             class="w-full gap-x-2 py-2.5 px-2 md:px-4 text-sm font-medium border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white {{ $group->status ?: 'bg-gray-50' }}">

                            <div class="flex justify-between">
                                <a class="btn pl-0 text-left {{ $group->status ?: 'text-muted' }}"
                                   @if (!$group->childs->isEmpty()) href="javascript:void(0)"
                                 x-on:click="expanded = !expanded" @endif>
                                    @if ($group->is_featured)
                                        <i class="bx bxs-star bx-xs mr-1" title="Kategori unggulan"></i>
                                    @else
                                        <i class="bx bx-xs" style="margin-right: 1.25rem"></i>
                                    @endif
                                    {{ $group->name }}
                                </a>

                                <div class="flex mx-2">
                                    @can('create.faq-category', 'web')
                                        <a class="btn px-1 md:px-2 py-0 text-xs rounded-e-none bg-light"
                                           href="javascript:void(0)" title="Tambah sub kategori"
                                           wire:click="createSubCategory('{{ $group->id }}')"
                                           x-on:click="createModal =!createModal">
                                            <i class="bx bx-plus"></i>
                                        </a>
                                    @endcan

                                    @can('update.faq-category', 'web')
                                        <a class="btn px-1 md:px-2 py-0 text-xs rounded-none bg-light"
                                           href="javascript:void(0)" wire:click="edit('{{ $group->id }}')"
                                           x-on:click="editModal =!editModal">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    @endcan

                                    @can('delete.faq-category', 'web')
                                        <a class="btn px-1 md:px-2 py-0 text-xs rounded-s-none bg-light"
                                           href="javascript:void(0)" wire:click="$set('destroyId', '{{ $group->id }}')"
                                           x-on:click="deleteConfirm =!deleteConfirm">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    @endcan

                                    @can('update.faq-category', 'web')
                                        <button type="button"
                                                class="btn px-1 md:px-2 py-0 text-xs bg-dark cursor-grab active:cursor-grabbing text-white ms-2"
                                                wire:sortable.handle title="Tahan untuk memindahkan posisi">
                                            <i class="bx bx-sort-alt-2"></i>
                                        </button>
                                    @endcan
                                </div>
                            </div>

                            @if (!$group->childs->isEmpty())
                                <p class="small mb-0 pl-5 text-xs text-gray-400">Sub kategori:
                                    {{ $group->childs->count() }}
                                    <a :title="expanded ? 'Sembunyikan' : 'Lihat'" href="javascript:void(0)"
                                        class="ml-1 bg-gray-200 w-5 h-4 rounded p-1" x-on:click="expanded = !expanded">
                                        <i :class="expanded ? 'bx bx-hide' : 'bx bx-show-alt'"></i>
                                    </a>
                                </p>
                            @endif

                            @if (!$group->childs->isEmpty())
                                <div class="flex flex-col border-t mt-2" x-show="expanded" x-collapse.duration.500ms
                                     wire:sortable-group.item-group="{{ $group->id }}"
                                     wire:sortable-group.options="{ animation: 100 }">

                                    @foreach ($group->childs->sortBy('sort_order') as $sub_category)
                                        <div wire:sortable-group.item="{{ $sub_category->id }}"
                                             wire:key="category-{{ $sub_category->id }}"
                                             class="w-full gap-x-2 py-2 px-4 text-sm font-medium text-gray-800 first:mt-0 dark:text-white flex justify-between capitalize {{ $sub_category->status ?: ' bg-slate-50' }}">
                                            <a
                                               class="w-full text-left self-center {{ $sub_category->status ?: 'text-muted' }}">
                                                @if ($sub_category->is_featured)
                                                    <i class="bx bxs-star bx-xs mr-1" title="Kategori unggulan"></i>
                                                @else
                                                    <i class="bx bx-xs mr-3"></i>
                                                @endif

                                                @if ($sub_category->with_icon)
                                                    <span class="me-1 px-2">
                                                        <i class="{{ $sub_category->icon_class }}"></i>
                                                    </span>
                                                @endif

                                                @if ($sub_category->with_image)
                                                    <span class="me-1">
                                                        <img src="{{ $sub_category->media_path }}"
                                                             style="width: 100%; max-width: 30px" alt="">
                                                    </span>
                                                @endif
                                                {{ $sub_category->name }}
                                            </a>

                                            <div class="flex mx-2">
                                                <a class="btn px-2 py-0 text-xs rounded-e-none bg-light"
                                                   href="javascript:void(0)"
                                                   wire:click="edit('{{ $sub_category->id }}')"
                                                   x-on:click="editModal =!editModal">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a class="btn px-1 md:px-2 py-0 text-xs rounded-s-none bg-light"
                                                   href="javascript:void(1)"
                                                   wire:click="$set('destroyId', '{{ $sub_category->id }}')"
                                                   x-on:click="deleteConfirm =!deleteConfirm">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                                <button type="button"
                                                        class="btn px-2 py-0 text-xs bg-dark cursor-grab active:cursor-grabbing text-white ms-2"
                                                        wire:sortable-group.handle
                                                        title="Tahan untuk memindahkan posisi">
                                                    <i class="bx bx-sort-alt-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if (!$categories->isEmpty())
                    <div class="mt-3">
                        <x-common::utils.pagination :paginator="$categories" />
                    </div>
                @endif
            </div>

        </div>
    </div>

    <livewire:administrator::faq-category.create />
    <livewire:administrator::faq-category.edit />
    <x-common::utils.remove-modal />
</div>
