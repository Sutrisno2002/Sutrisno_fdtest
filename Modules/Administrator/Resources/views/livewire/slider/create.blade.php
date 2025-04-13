<div>
    <form wire:submit.prevent="store">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-8/12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 pb-1">Tentang Slider</h5>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <livewire:common::utils.filepond />

                            @error('thumbnail')
                                <small class="text-danger">{{ $message }}</small>
                            @else
                                <small class="text-muted"><em>Format: .png, .jpg, .jpeg. Ratio: 1:3</em></small>
                            @enderror
                        </div>

                        <div class="form-group-row flex-col md:flex-row">
                            {{-- Name --}}
                            <div class="form-group w-full md:w-6/12">
                                <label for="name">Nama</label>
                                <input type="text" class="form-input" id="name" wire:model.lazy="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="form-group w-full md:w-6/12">
                                <label for="alt">Teks
                                    Alt.</label>
                                <input type="text" class="form-input" id="alt" wire:model.defer="alt">
                                @error('alt')
                                    <small class="text-danger">{{ $message }}</small>
                                @else
                                    <small class="text-muted"><em>*Nama yang akan ditampilkan ketika gambar gagal
                                            dimuat</em></small>
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
                    </div>
                </div>
            </div>

            <div class="md:w-4/12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 pb-1">Pengaturan Slider</h5>
                    </div>

                    <div class="card-body">
                        {{-- Link Banner --}}
                        <div class="form-group">
                            <label for="reference_url">Link
                                Slider</label>
                            <input type="text" class="form-input" id="reference_url"
                                   wire:model.defer="reference_url">
                            @error('reference_url')
                                <small class="text-danger">{{ $message }}</small>
                            @else
                                <small class="text-muted"><em>*Ketika banner di klik, akan diarahkan ke link yang
                                        tertulis</em></small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="flex items-center">
                                <input type="checkbox" class="form-switch me-2" id="with_caption" name="with_caption"
                                       wire:click="$toggle('with_caption')" wire:model="with_caption">
                                <label class="text-gray-800 text-sm font-medium inline-block"class="custom-control-label"
                                       for="with_caption">Aktifkan caption?</label>
                            </div>
                        </div>

                        @if ($with_caption)
                            <div class="form-group">
                                <label for="caption_title">Judul Caption</label>
                                <input type="text" class="form-input" id="caption_title"
                                       wire:model.defer="caption_title">
                                @error('caption_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="caption_text">Deskripsi Caption</label>
                                <textarea type="text" class="form-input" id="caption_text" wire:model.defer="caption_text"></textarea>
                                @error('caption_text')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="flex items-center">
                                <input type="checkbox" class="form-switch me-2" id="with_button" name="with_button"
                                       wire:click="$toggle('with_button')" wire:model="with_button">
                                <label class="text-gray-800 text-sm font-medium inline-block"class="custom-control-label"
                                       for="with_button">Aktifkan button?</label>
                            </div>
                        </div>

                        @if ($with_button)
                            <div class="form-group mt-3">
                                <label for="button_text">
                                    Teks Button
                                    <input type="text" class="form-input" id="button_text"
                                           wire:model.defer="button_text">
                                </label>
                                @error('button_text')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="button_link">
                                    Link Button
                                    <input type="text" class="form-input" id="button_link"
                                           wire:model.defer="button_link">
                                </label>
                                @error('button_link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif

                        @can('publish.slider', 'web')
                            <div class="form-group">
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-switch me-2" id="is_active" name="is_active"
                                           wire:click="$toggle('is_active')" wire:model="is_active">
                                    <label class="text-gray-800 text-sm font-medium inline-block"class="custom-control-label"
                                           for="is_active">Aktifkan slider?</label>
                                </div>
                            </div>
                        @endcan

                        <div class="p-2 text-end">
                            {{-- Save Button --}}
                            <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900" :disabled="false"
                                                    :loading="true" target="store">
                                Simpan
                            </x-common::utils.button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
