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
            <h5 class="card-title mb-0 pb-1">Edit User</h5>
            <p>Perbarui data pengguna pada sistem.</p>
            <form wire:submit.prevent="update">

                {{-- Name --}}
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" wire:model.defer="name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-row">
                    {{-- Email --}}
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" wire:model.defer="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="form-group col-md-4">
                        <label for="role">Role</label>
                        <select class="form-control custom-select" id="role" wire:model.defer="role">
                            <option value="">-- Pilih Peran --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Account Status --}}
                    <div class="form-group col-md-4">
                        <label for="status">Status Akun</label>
                        <select class="form-control custom-select" id="status" wire:model.defer="status">
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

                <hr>

                <div class="form-row">
                    {{-- Password --}}
                    <div class="form-group col-md-6">
                        <label for="password">Kata sandi</label>
                        <input type="password" class="form-control" id="password" wire:model.defer="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Ulangi kata sandi</label>
                        <input type="password" class="form-control" id="password_confirmation"
                               wire:model.defer="password_confirmation">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    {{-- Email verified --}}
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="form-checkbox rounded text-primary" id="verified" name="verified"
                               wire:model.defer="verified">
                        <label class="custom-control-label" for="verified">Verifikasi email</label>
                        <br>
                        @error('verified')
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
