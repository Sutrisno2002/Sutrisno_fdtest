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
        <div class="card-body">
            <h5 class="card-title mb-0 pb-1">Edit Pengaturan</h5>
            {{-- <p>Ini adalah deskripsi bantuan untuk mengisi form pada halaman appsetting.</p> --}}
            <form wire:submit.prevent="update">
                <div class="form-row">
                    {{-- Group --}}
                    <div class="form-group col-md-4">
                        <label for="group">Group</label>
                        <input list="groups" class="form-control" id="group" wire:model.defer="group">

                        <datalist id="groups">
                            @foreach ($groups as $group)
                                <option value="{{ $group->group }}" />
                            @endforeach
                        </datalist>
                        @error('group')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Key --}}
                    <div class="form-group col-md-4">
                        <label for="key">Key</label>
                        <input type="text" class="form-control" id="key" wire:model.lazy="key">
                        @error('key')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Name --}}
                    <div class="form-group col-md-4">
                        <label for="name">Label</label>
                        <input type="text" class="form-control" id="name" wire:model.defer="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row flex-column-reverse flex-md-row">

                    <div class="col-md-9">
                        @if ($type == 'input')
                            <label for="value">Value</label>
                            <input class="form-control" name="value" autocomplete="value" wire:model.defer="value" />
                        @elseif ($type == 'textarea')
                            <label for="value">Value</label>
                            <textarea class="form-control" name="value" autocomplete="value" style="height: 100px; resize:none"
                                      wire:model.defer="value"></textarea>
                        @elseif ($type == 'editor')
                            <livewire:component.editor :value="$value" />
                        @elseif ($type == 'image')
                            <livewire:component.filepond.image :images="$value" :oldImages="$value" />
                        @endif

                        @error('value')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3 mb-md-0">
                        <label for="type">Jenis Form</label>
                        @foreach ($types as $type)
                            <div class="custom-control custom-radio">
                                <input type="radio" id="{{ $type }}" value="{{ $type }}"
                                       class="form-checkbox rounded text-primary" wire:model.lazy="type">

                                <label class="custom-control-label" for="{{ $type }}">
                                    {{ Str::title($type) }}
                                </label>
                            </div>
                        @endforeach

                        @error('type')
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
