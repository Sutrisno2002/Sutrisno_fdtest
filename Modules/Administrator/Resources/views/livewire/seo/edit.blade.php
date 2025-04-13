<div>
    <form wire:submit.prevent="update">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-8/12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 pb-1">Informasi Pengaturan</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label class="text-gray-800 text-sm font-medium inline-block mb-2 capitalize"class="text-capitalize"
                                   for="value">{{ $name }}</label>
                            @if ($type == 'input')
                                <input class="form-input" name="value" autocomplete="value" wire:model.lazy="value" />
                            @elseif ($type == 'textarea')
                                <textarea class="form-input" name="value" autocomplete="value" style="height: 100px; resize:none"
                                          wire:model.lazy="value"></textarea>
                            @elseif ($type == 'editor')
                                <livewire:common::utils.editor :value="$value" />
                            @elseif ($type == 'image')
                                <livewire:common::utils.filepond :value="$value" :oldValue="$oldValue" />
                            @elseif($type == 'input:checkbox')
                                <input class="form-switch text-primary" type="checkbox" id="value"
                                       {{ $value ? 'checked' : '' }} wire:click="$toggle('value')">
                            @elseif($type == 'input:number')
                                <x-common::utils.input-number :value="$value" property="value"
                                                              mask="$money($input, '.', ',')" />
                            @endif

                            @error('value')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="p-2 text-end">
                            {{-- Save Button --}}
                            <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900" :disabled="false"
                                                    :loading="true" target="update">
                                Simpan
                            </x-common::utils.button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
