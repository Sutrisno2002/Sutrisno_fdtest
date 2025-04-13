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

    <div class="card">
        <div class="p-6">
            <h5 class="card-title mb-0 pb-1">Edit {{ $parent_id ? 'Sub' : null }} Navigasi</h5>
            <p>Perbarui data {{ $parent_id ? 'sub' : null }} navigasi pada website.</p>

            <form wire:submit.prevent="update">

                <div class="form-row">

                    {{-- Name --}}
                    <div class="form-group md:w-4/12">
                        <label for="name">Nama</label>
                        <input type="text" class="form-input" id="name" wire:model.lazy="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Url --}}
                    <div class="form-group md:w-8/12">
                        <label for="url">Url</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{ url('/ ') }}</div>
                            </div>
                            <input type="text" class="form-input" id="url" wire:model.defer="url"
                                   placeholder="/tentang-kami">
                        </div>
                        @error('url')
                            <small class="text-danger">{{ $message }}</small>
                        @else
                            <small class="text-muted">Mis. (/tentang-kami, /layanan/produk)</small>
                        @enderror
                    </div>
                </div>

                <div class="form-row">

                    @role('Developer')
                        {{-- Active State --}}
                        <div class="form-group md:w-4/12">
                            <label for="active_state">Class
                                Active</label>
                            <input type="text" class="form-input" id="active_state" wire:model.lazy="active_state">
                            @error('active_state')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Module --}}
                        <div class="form-group md:w-4/12">
                            <label for="module">Module</label>
                            <select name="module" id="module" class="form-input custom-select"
                                    wire:model.defer="module">
                                <option value="">Pilih module</option>
                                @foreach ($modules as $module)
                                    <option value="{{ $module }}">{{ $module }}</option>
                                @endforeach
                            </select>
                            @error('module')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    @endrole

                    {{-- Placement --}}
                    <div class="form-group md:w-4/12">
                        <label for="placement">Letak
                            Navigasi</label>
                        <select name="placement" id="placement" class="form-input custom-select"
                                wire:model.defer="placement">
                            <option value="">Pilih penempatan</option>
                            @foreach ($placements as $placement)
                                <option value="{{ $placement['value'] }}">{{ $placement['label'] }}</option>
                            @endforeach
                        </select>
                        @error('placement')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                {{-- Is Active --}}
                <div class="form-group ">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="form-checkbox rounded text-primary" id="is_active"
                               name="is_active" wire:model.defer="is_active">
                        <labelclass="custom-control-label"
                        for="is_active">Aktifkan {{ $parent_id ? 'sub' : null }}
                        navigasi?</label>
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
