<div>
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

    <div class="card">
        <div class="p-6">
            <h5 class="card-title mb-0 pb-1">Edit Halaman Web</h5>
            <p>
                Perbarui halaman web baru pada website. Halaman ini adalah halaman yang dapat
                diakses oleh publik.
            </p>
            <div class="mt-6">
                <form wire:submit.prevent="update">
                    <div class="w-full flex flex-col md:flex-row">
                        {{-- Title --}}
                        <div class="form-group md:w-6/12">
                            <label for="title">Nama
                                Halaman</label>
                            <input type="text" class="form-input" id="title" wire:model.lazy="title">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="form-group md:w-6/12">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-input" id="slug" wire:model.defer="slug">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Short description --}}
                    <div class="form-group">
                        <label for="short_description">Deskripsi
                            Singkat</label>
                        <textarea type="text" class="form-input" id="short_description" wire:model.defer="short_description"></textarea>
                        @error('short_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label for="description">Konten</label>
                        <livewire:common::utils.editor class="h-12" :value="$description" />
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{-- Is Active --}}
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="form-checkbox rounded text-primary" id="is_active"
                                name="is_active" wire:model="is_active">
                            <label class="custom-control-label" for="is_active">Aktifkan
                                halaman?</label>
                            <br>
                            @error('is_active')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Save Button --}}
                    <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900" :disabled="false"
                        :loading="true" target="store">
                        Simpan
                    </x-common::utils.button>
                </form>
            </div>

        </div>
    </div>
</div>
