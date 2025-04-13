<div>
    @if (session()->has('success'))
        <x-common::utils.alert class="primary mb-3" icon="bx bx-check-circle" title="Sukses!" dismissable>
            {{ session()->get('success') }}
        </x-common::utils.alert>
    @endif

    @if (session()->has('error'))
        <x-common::utils.alert class="warning mb-3" icon="bx bx-info-circle" title="Upss.. Tampaknya ada yang salah"
                               dismissable>
            {{ session()->get('error') }}
        </x-common::utils.alert>
    @endif

    <div class="row flex-column-reverse flex-lg-row">
        <div class="col-lg-7">
            <div class="card">
                <div class="p-6">
                    <div class="form-row">
                        <div class="form-group mb-md-0 col-md-4 ml-auto">
                            <div class="input-group">
                                <input type="text" class="form-input" id="search" name="search"
                                       wire:model.lazy="search" placeholder="Pencarian...">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-group shadow-sm" wire:sortable="updateOrder" wire:sortable-group="updateCategoryOrder">
                @forelse ($datas as $item)
                    <div class="list-group-item text-capitalize {{ $item->is_active ? null : 'bg-light' }}"
                         wire:key="group-{{ $item->id }}" wire:sortable.item="{{ $item->id }}"
                         title="{{ !$item->is_active ? 'Level Non-aktif' : null }}">

                        <div class="flex">
                            <a class="btn pb-0 btn-block text-left {{ $item->is_active ? null : 'text-muted' }}">
                                <strong>{{ $item->name }}</strong>
                                <p class="m-0 small text-muted text-left">{{ $item->description }}</p>
                            </a>
                            <div class="flex m-auto" style="height: fit-content;">
                                <div class="btn-group mx-2">
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
                                <div class="btn btn-sm px-2 py-2 btn-dark cursor-grab" wire:sortable.handle
                                     title="Tahan untuk memindahkan posisi">
                                    <i class="bx bx-sort-alt-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="list-group-item py-4">
                        <p class="text-center m-0">
                            Level yang kamu cari tidak kami temukan.</p>
                    </div>
                @endforelse
            </div>

            @if (!$datas->isEmpty())
                <div class="mt-3">
                    <x-common::utils.pagination :paginator="$datas" />
                </div>
            @endif
        </div>

        <div class="col-lg-5" wire:loading.class="skeleton" wire:target="mode">
            @if ($mode == 'edit')
                <livewire:administrator::level.edit />
            @elseif ($mode == 'create')
                <livewire:administrator::level.create />
            @else
                <div class="card text-center">
                    <div class="p-6 py-5">
                        <div class="my-5 flex flex-column align-items-center justify-content-center h-100 w-100">
                            <img class="w-75 mb-5" src="{{ cache('thumbnail_create') }}" alt="">
                            <button type="button" class="btn bg-primary" wire:click="$set('mode', 'create')">
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <x-common::utils.remove-modal />
</div>
