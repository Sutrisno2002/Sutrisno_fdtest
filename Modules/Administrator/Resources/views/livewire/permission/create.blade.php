<div>
    <form wire:submit.prevent="store">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-8/12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 pb-1">Informasi Permission</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group-row flex-col md:flex-row">
                            <div class="form-group w-full md:w-6/12">
                                <label for="name">Permission</label>
                                <input type="name" class="form-input" id="name" wire:model.defer="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group w-full md:w-6/12">
                                <label for="guard">Guard</label>
                                <select class="form-input capitalize" id="guard" wire:model.live="guard">
                                    @foreach ($guards as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @error('guard')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
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
