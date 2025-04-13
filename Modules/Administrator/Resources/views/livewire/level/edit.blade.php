<div>
    @if (session()->has('success'))
        <x-common::utils.alert class="alert-primary" wire:ignore>
            {{ session()->get('success') }}
        </x-common::utils.alert>
    @endif

    @if (session()->has('error'))
        <x-common::utils.alert class="alert-warning">
            {{ session()->get('error') }}
        </x-common::utils.alert>
    @endif

    <div class="card">
        <div class="p-6">
            <h5 class="card-title mb-0 pb-1">Edit Level</h5>
            <p>Edit level yang tersedia pada website.</p>

            <form wire:submit.prevent="update">
                <div class="form-row">

                    {{-- Name --}}
                    <div class="form-group md:w-6/12">
                        <label for="name">Nama</label>
                        <input type="text" class="form-input" id="name" wire:model.lazy="name">
                        @error('name')
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

                {{-- Deskripsi --}}
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea type="text" class="form-input" id="description" wire:model.defer="description"></textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {{-- Toggle --}}
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="form-checkbox rounded text-primary" id="is_active"
                               name="is_active" wire:model.defer="is_active">
                        <labelclass="custom-control-label"
                        for="is_active">Aktifkan?</label>
                        <br>
                        @error('is_active')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Save Button --}}
                <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900" :disabled="false"
                                        :loading="true" target="update">
                    Simpan
                </x-common::utils.button>
            </form>
        </div>
    </div>
</div>
