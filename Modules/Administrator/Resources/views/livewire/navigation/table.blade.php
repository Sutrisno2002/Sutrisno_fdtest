<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-row">
                <div class="form-group md:w-6/12 col-lg-4">
                    <label for="placement">Letak
                        Navigasi</label>
                    <select name="placement" id="placement" class="form-input custom-select" wire:model="placement">
                        @foreach ($placements as $placement)
                            <option value="{{ $placement['value'] }}">{{ $placement['label'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-5 mb-3">
            <div class="list-group rounded-lg shadow-sm" wire:sortable="updateOrder"
                 wire:sortable-group="updateNavigationOrder">
                @forelse ($navigations as $item)
                    <div class="list-group-item text-capitalize flex {{ $item->is_active ? 'bg-primary' : 'bg-light' }}"
                         wire:key="group-{{ $item->id }}" wire:sortable.item="{{ $item->id }}"
                         title="{{ !$item->is_active ? 'Kategori Non-aktif' : null }}">

                        <a class="btn bg-block text-left {{ $item->is_active ? 'text-white' : 'text-muted' }}">
                            @if ($item->is_featured)
                                <i class="bx bxs-star bx-xs mr-1" title="Kategori unggulan"></i>
                            @else
                                <i class="bx bx-xs mr-3"></i>
                            @endif
                            {{ $item->name }}
                        </a>

                        <div class="btn-group mx-2">
                            <a class="btn btn-sm px-2 py-2 btn-light" href="javascript:void(0)"
                               title="Tambah sub kategori"
                               wire:click="createSubNavigation('{{ $item->id }}', '{{ request()->get('placement') }}')">
                                <i class="bx bx-plus"></i>
                            </a>
                            <a class="btn btn-sm px-2 py-2 btn-light" href="javascript:void(0)"
                               wire:click="edit('{{ $item->id }}')">
                                <i class="bx bx-edit"></i>
                            </a>
                            <a class="btn btn-sm px-2 py-2 btn-light" href="javascript:void(0)"
                               wire:click="$set('destroyId', '{{ $item->id }}')" data-toggle="modal"
                               data-target="#remove-modal">
                                <i class="bx bx-trash"></i>
                            </a>
                        </div>
                        <div class="btn btn-sm px-2 py-2 btn-dark" wire:sortable.handle
                             title="Tahan untuk memindahkan posisi" class="cursor-grab">
                            <i class="bx bx-sort-alt-2"></i>
                        </div>

                    </div>

                    @if (!$item->childs->isEmpty())
                        <div class="list-group child" wire:sortable-group.item-group="{{ $item->id }}">

                            @foreach ($item->childs->sortBy('sort_order') as $sub_navigation)
                                <div class="list-group-item text-capitalize flex {{ $sub_navigation->is_active ?: 'bg-light' }}"
                                     wire:key="sub_navigation-{{ $sub_navigation->id }}"
                                     wire:sortable-group.item="{{ $sub_navigation->id }}"
                                     title="{{ !$sub_navigation->is_active ? 'Kategori Non-aktif' : null }}">

                                    <a
                                       class="btn-block text-left align-self-center {{ $sub_navigation->is_active ?: 'text-muted' }}">
                                        @if ($sub_navigation->is_featured)
                                            <i class="bx bxs-star bx-xs mr-1" title="Kategori unggulan"></i>
                                        @else
                                            <i class="bx bx-xs mr-3"></i>
                                        @endif

                                        @if ($sub_navigation->with_icon)
                                            <span class="me-1 px-2">
                                                <i class="{{ $sub_navigation->icon_class }}"></i>
                                            </span>
                                        @endif

                                        @if ($sub_navigation->with_image)
                                            <span class="me-1">
                                                <img src="{{ $sub_navigation->media_path }}"
                                                     style="width: 100%; max-width: 30px" alt="">
                                            </span>
                                        @endif
                                        {{ $sub_navigation->name }}
                                    </a>

                                    <div class="btn-group mx-2">
                                        <a class="btn btn-sm px-2 py-2 btn-light" href="javascript:void(0)"
                                           wire:click="edit('{{ $sub_navigation->id }}')">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a class="btn btn-sm px-2 py-2 btn-light" href="javascript:void(0)"
                                           wire:click="$set('destroyId', '{{ $sub_navigation->id }}')"
                                           data-toggle="modal" data-target="#remove-modal">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                    <div class="btn btn-sm px-2 py-2 btn-dark" wire:sortable-group.handle
                                         title="Tahan untuk memindahkan posisi" class="cursor-grab">
                                        <i class="bx bx-sort-alt-2"></i>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
                @empty
                    <div class="list-group-item">
                        <p class="text-center my-3">Sayang sekali, navigasi tidak di temukan.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-3">

                @if (!$navigations->isEmpty())
                    <x-common::utils.pagination :paginator="$navigations" />
                @endif
            </div>
        </div>

        <div class="col-md-6 col-lg-7">
            @if ($mode == 'edit')
                <livewire:administrator::navigation.edit />
            @else
                <livewire:administrator::navigation.create />
            @endif
        </div>
    </div>
    <x-common::utils.remove-modal />
</div>
