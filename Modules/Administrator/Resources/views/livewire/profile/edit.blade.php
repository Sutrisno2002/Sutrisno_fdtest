<div x-data="{ cropModal: false }">
    <div class="flex flex-col md:flex-row gap-3">
        <div data-fc-type="tab" class="md:w-4/12 lg:w-3/12">
            <div class="card">
                <div class="card-body">
                    <div class="space-y-2" wire:ignore>
                        <a href="javascript:void(0);"data-fc-target="#update-profile"
                           class="fc-tab-active:bg-slate-100 fc-tab-active:text-slate-700 active flex items-center py-2 px-4 text-sm rounded text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:bg-gray-700 dark:hover:text-gray-300">
                            <i class="bx bx-user me-3.5 w-4"></i>
                            <span>Profil</span>
                        </a>
                        <a href="javascript:void(0);"data-fc-target="#update-password"
                           class="fc-tab-active:bg-slate-100 fc-tab-active:text-slate-700 flex items-center py-2 px-4 text-sm rounded text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                            <i class="bx bx-lock me-3.5 w-4"></i>
                            <span>Ubah Kata Sandi</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:w-6/12">
            <div id="update-profile" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-1" wire:ignore.self>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Profil</h5>
                    </div>
                    <div class="card-body">
                        <div class="relative h-20 w-20 overflow-hidden rounded-full bg-light cursor-pointer mb-4"
                             x-on:click="cropModal =! cropModal">
                            <img class="w-full h-full object-center object-cover" id="avatar-target"
                                 src="{{ $oldAvatar }}" alt="" wire:ignore>
                            <div
                                 class="bg-light absolute h-full w-full grid place-items-center opacity-0 hover:opacity-75 top-0 left-0 transition-all">
                                <i class="bx bx-pencil bx-sm"></i>
                            </div>
                        </div>

                        <form wire:submit.prevent="updateProfile">
                            <div class="form-group-row flex-col md:flex-row">
                                <div class="form-group w-full md:w-6/12">
                                    <labelfor="name">Nama
                                    Lengkap</label>
                                    <input type="text" class="form-input" id="name" wire:model.defer="name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group w-full md:w-6/12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-input" id="email" wire:model.defer="email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="p-2 text-end">
                                {{-- Save Button --}}
                                <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900"
                                                        :disabled="false" :loading="true" target="updateProfile">
                                    Simpan
                                </x-common::utils.button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="update-password" class="hidden" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-2"
                 wire:ignore.self>
                <form wire:submit.prevent="updatePassword">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Ubah kata sandi</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group-row flex-col md:flex-row">
                                <div class="form-group w-full md:w-6/12">
                                    <label for="password">Kata
                                        sandi</label>
                                    <input type="password" class="form-input" id="password"
                                           wire:model.defer="password">
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
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="p-2 text-end">
                                {{-- Save Button --}}
                                <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900"
                                                        :disabled="false" :loading="true" target="updatePassword">
                                    Simpan
                                </x-common::utils.button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <livewire:common::utils.avatar-cropper />
</div>
