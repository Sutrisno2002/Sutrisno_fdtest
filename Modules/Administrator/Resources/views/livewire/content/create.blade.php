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
            <h5 class="card-title mb-0 pb-1">Tambah Konten</h5>
            {{-- <p>Ini adalah deskripsi bantuan untuk mengisi form pada halaman appsetting.</p> --}}
            <form wire:submit.prevent="store">

                <div class="form-row">
                    {{-- Group --}}
                    <div class="form-group md:w-4/12">
                        <label for="slug_group">Group</label>
                        <input list="groups" class="form-input" id="slug_group" wire:model.defer="slug_group">

                        <datalist id="groups">
                            @foreach ($groups as $group)
                                <option value="{{ $group->group }}" />
                            @endforeach
                        </datalist>
                        @error('slug_group')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Key --}}
                    <div class="form-group md:w-4/12">
                        <label for="key">Key</label>
                        <input type="text" class="form-input" id="key" wire:model.lazy="key">
                        @error('key')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Label --}}
                    <div class="form-group md:w-4/12">
                        <label for="label">Label</label>
                        <input type="text" class="form-input" id="label" wire:model.defer="label">
                        @error('label')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row flex-column-reverse flex-md-row">

                    <div class="col-md-9">
                        @if ($type == 'input')
                            <labelfor="value">Value</label>
                            <input class="form-input" name="value" autocomplete="value" wire:model.defer="value" />
                        @elseif ($type == 'textarea')
                            <labelfor="value">Value</label>
                            <textarea class="form-input" name="value" autocomplete="value" style="height: 100px; resize:none"
                                      wire:model.defer="value"></textarea>
                        @elseif ($type == 'editor')
                            <livewire:component.editor />
                        @elseif ($type == 'image')
                            <livewire:component.filepond.image :images="$value" :oldImages="$value" />
                        @endif

                        @error('value')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3 mb-md-0">
                        <label for="type">Jenis
                            Form</label>
                        <div class="form-group">
                            @foreach ($types as $type)
                                <div class="custom-control custom-radio d-inline-flex mr-2">
                                    <input type="radio" id="{{ $type }}" value="{{ $type }}"
                                           class="form-checkbox rounded text-primary" wire:model.lazy="type">

                                    <labelclass="custom-control-label"
                                    for="{{ $type }}">
                                    {{ Str::title($type) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Save Button --}}
                <x-common::utils.button class="btn bg-dark" :disabled="false" :loading="true" target="store">
                    Simpan
                </x-common::utils.button>
            </form>
        </div>
    </div>
</div>
