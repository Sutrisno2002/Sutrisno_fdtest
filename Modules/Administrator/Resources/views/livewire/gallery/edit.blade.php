<div>
    <form wire:submit.prevent="update">
        <div class="flex gap-6 w-full">

            <div class="card w-2/3">
                <div class="card-header">
                    <h5 class="card-title mb-0 pb-1">Media</h5>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input class="hidden" type="file" id="image" multiple wire:model="newImage">

                        <label>Media Baru</label>
                        @if ($newImage == null)
                            <label
                                class="w-full flex flex-col justify-center p-6 items-center rounded-xl border-dashed border-2 border-gray-500 bg-gray-200"
                                for="image">
                                <i class='bx bx-upload text-2xl text-gray-400'></i>
                                <span class="text-gray-400 text-lg">Klik untuk mengupload gambar baru</span>
                            </label>
                        @elseif ($newImage)
                            <div
                                class="w-full flex gap-6 flex-wrap rounded-xl p-6 border-dashed border-2 border-gray-500 bg-gray-200 ">

                                @foreach ($newImage as $item)
                                    <div class="relative" x-data="{ show: false, loaded: false }" x-init="setTimeout(() => show = true, 100)" x-show="show"
                                        x-transition:enter="transition ease-out duration-1000"
                                        x-transition:enter-start="opacity-0 transform translate-y-4"
                                        x-transition:enter-end="opacity-100 transform translate-y-0"
                                        x-transition:leave="transition ease-in duration-1000"
                                        x-transition:leave-start="opacity-100 transform translate-y-0"
                                        x-transition:leave-end="opacity-0 transform translate-y-4">
                                        <a x-show="loaded" x-transition:enter="transition ease-out duration-1000"
                                            x-transition:enter-start="opacity-0 scale-75"
                                            x-transition:enter-end="opacity-100 scale-100" href="javascript:void(0)"
                                            wire:click="deleteItem({{ $loop->index }})">
                                            <div
                                                class="absolute right-1 top-1 rounded-full flex justify-center items-center w-6 h-6 drop-shadow-md bg-red-700 hover:bg-red-800 transition-all duration-300">
                                                <i class="bx bx-x text-xl text-gray-100"></i>
                                            </div>
                                        </a>
                                        <img @load="loaded = true"
                                            x-transition:enter="transition ease-out duration-1000"
                                            x-transition:enter-start="opacity-0 transform translate-y-4"
                                            x-transition:enter-end="opacity-100 transform translate-y-0"
                                            class="h-32 rounded-md object-contain" src="{{ $item->temporaryUrl() }}"
                                            alt="">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="mt-6">
                            <label>Media Lama</label>
                            <div
                                class="w-full flex gap-6 flex-wrap rounded-xl p-6 border-dashed border-2 border-gray-500 bg-gray-200 ">
                                @foreach ($oldImage as $item)
                                    @php
                                        $old = $oldImage->count();
                                        $current = count($deletedImage);
                                        $diff = $old - $current;
                                        $isDeleted = in_array($item->key, $deletedImage);
                                    @endphp
                                    <div class="relative {{ $isDeleted ? 'opacity-50 pointer-events-none' : '' }}"
                                        x-data="{ show: false, loaded: false }" x-init="setTimeout(() => show = true, 100)" x-show="show"
                                        x-transition:enter="transition ease-out duration-1000"
                                        x-transition:enter-start="opacity-0 transform translate-y-4"
                                        x-transition:enter-end="opacity-100 transform translate-y-0"
                                        x-transition:leave="transition ease-in duration-1000"
                                        x-transition:leave-start="opacity-100 transform translate-y-0"
                                        x-transition:leave-end="opacity-0 transform translate-y-4">
                                        <div class="absolute w-full flex justify-end p-3">
                                            @can('delete.gallery', 'web')
                                                <a title="Hapus" href="javascript:void(0)"
                                                    class="
                                                    {{ $item->count() == 1 ? 'hidden' : '' }}
                                                    {{ $diff == 1 ? 'hidden' : '' }}
                                                    {{ $isDeleted ? 'hidden' : '' }}"
                                                    wire:click="deleteImage('{{ $item->key }}')">
                                                    <div
                                                        class="absolute right-3 top-3 rounded-full flex justify-center items-center w-8 h-8 drop-shadow-md bg-gray-100 hover:bg-gray-300 transition-all duration-300">
                                                        <i class="bx bx-trash text-md text-gray-500"></i>
                                                    </div>
                                                </a>
                                            @endcan
                                        </div>

                                        <img @load="loaded = true"
                                            x-transition:enter="transition ease-out duration-1000"
                                            x-transition:enter-start="opacity-0 transform translate-y-4"
                                            x-transition:enter-end="opacity-100 transform translate-y-0"
                                            class="h-32 rounded-md object-contain" src="{{ url($item->path) }}"
                                            alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card w-1/3">
                <div class="card-header">
                    <h5 class="card-title mb-0 pb-1">Tentang Galeri</h5>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="date">Tanggal Kegiatan</label>
                        <div class="input-group">
                            <input id="date" type="date" class="form-input rounded-none" name="date"
                                wire:model="date">
                        </div>

                        @error('date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Judul Kegiatan</label>
                        <input id="title" type="text" class="form-input" name="title" wire:model.lazy="title">

                        @error('title')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="description">Deskripsi Kegiatan</label>
                        <livewire:common::utils.editor class="h-12" />

                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div> --}}

                    <div class="px-2">
                        {{-- Save Button --}}
                        <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900" :disabled="false"
                            :loading="true" target="update">
                            Simpan
                        </x-common::utils.button>
                    </div>
                </div>
            </div>


        </div>
    </form>
</div>
