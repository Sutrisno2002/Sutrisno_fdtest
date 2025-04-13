<div>
    <form wire:submit.prevent="store">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-8/12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 pb-1">Informasi User</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama
                                Lengkap</label>
                            <input type="text" class="form-input" id="name" wire:model.defer="name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group-row flex-col md:flex-row">
                            <div class="form-group w-full md:w-4/12">
                                <label for="email">Email</label>
                                <input type="email" class="form-input" id="email" wire:model.defer="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group w-full md:w-4/12">
                                <label for="role">Role</label>
                                <livewire:common::utils.tagify.tag :whitelist="$roles->pluck('name')->toArray()"
                                                                   placeholder="Pilih role disini..." />
                                @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group w-full md:w-4/12">
                                <label for="status">Status
                                    Akun</label>
                                <select class="form-input custom-select" id="status" wire:model.defer="status">
                                    <option value="">-- Pilih Status --</option>
                                    @foreach ($account_statuses as $status)
                                        <option value="{{ $status->value }}">{{ $status->label }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group-row flex-col md:flex-row">
                            <div class="form-group w-full md:w-6/12">
                                <label for="password">Kata
                                    sandi</label>
                                <input type="password" class="form-input" id="password" wire:model.defer="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group w-full md:w-6/12">
                                <label for="password_confirmation">Ulangi
                                    kata sandi</label>
                                <input type="password" class="form-input" id="password_confirmation"
                                       wire:model.defer="password_confirmation">
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- Email verified --}}
                            <div class="flex items-center">
                                <input type="checkbox" class="form-switch me-2" id="verified" name="verified"
                                       wire:model.defer="verified">
                                <label class="text-gray-800 text-sm font-medium inline-block"class="custom-control-label"
                                       for="verified">Verifikasi email</label>
                                @error('verified')
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
