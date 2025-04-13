<div x-show="editModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
     aria-modal="true" wire:init="initModal">
    <div class="flex items-end justify-center min-h-screen px-4 text-center items-center sm:p-0">
        <div x-cloak x-show="editModal" x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
             aria-hidden="true"></div>

        <div x-cloak x-show="editModal" x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="inline-block w-full max-w-xl my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">

            <div class="bg-light px-6 py-4 flex justify-between items-center {{ $loading ? 'skeleton' : null }}">
                <h5 class="modal-title">Edit {{ $parent_id ? 'Sub' : null }} Kategori</h5>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        x-on:click="editModal = false" wire:click="closeModal">
                    <i class="bx bx-x"></i>
                </button>
            </div>

            <form wire:submit.prevent="update" class="p-6 {{ $loading ? 'skeleton' : null }}"
                  wire:loading.class="skeleton" wire:target="update">
                <div class="grid md:grid-cols-2 gap-3">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-input" id="name" wire:model.lazy="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-input" id="slug" wire:model.defer="slug">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea type="text" class="form-input" id="description" wire:model.defer="description"></textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                @if ($parent_id)
                    <div class="form-row">
                        {{-- Kategori --}}
                        <div class="form-group md:w-6/12">
                            <label for="parent_id">Kategori</label>
                            <select id="parent_id" class="form-input custom-select" wire:model.defer="parent_id">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('parent_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                @endif
                <div class="form-group">
                    {{-- Toggle --}}
                    <div class="flex items-center">
                        <input type="checkbox" class="form-checkbox rounded text-primary" id="is_featured_e"
                               name="is_featured_e" wire:click="$toggle('is_featured')"
                               {{ $is_featured ? 'checked' : null }}>
                        <label class="text-gray-800 text-sm font-medium inline-block ms-2" for="is_featured_e">
                            Apakah {{ $parent_id ? 'sub' : null }} kategori unggulan ?
                        </label>
                    </div>
                    @error('is_featured')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @can('publish.faq-category', 'web')
                    {{-- Status --}}
                    <div class="form-group">
                        <div class="flex items-center">
                            <input type="checkbox" class="form-switch" id="status_e" name="status"
                                   wire:click="$toggle('status')" {{ $status ? 'checked' : null }}>
                            <label class="text-gray-800 text-sm font-medium inline-block ms-2" for="status_e">
                                Aktifkan {{ $parent_id ? 'sub' : null }} kategori?
                            </label>
                        </div>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @endcan

                <div class="flex justify-end gap-2 mt-4 pt-4 border-t">
                    <button type="button" class="btn bg-gray-100 hover:bg-gray-200" x-on:click="editModal = false"
                            wire:click="closeModal">
                        Batal
                    </button>

                    {{-- Save Button --}}
                    <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900" :disabled="false"
                                            :loading="true" target="update">
                        Simpan
                    </x-common::utils.button>
                </div>
            </form>

        </div>
    </div>
</div>
