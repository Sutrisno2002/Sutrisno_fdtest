<div x-data="{ cropModal: false }">
    <form wire:submit.prevent="update">
        <div class="flex flex-col md:flex-row gap-6 mb-4">
            <div class="w-full md:w-2/3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 pb-1">Informasi Data Diri</h5>
                    </div>

                    <div class="card-body">

                        <!-- Name Input -->
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input id="name" type="text" class="form-input" name="name" wire:model="name"
                                placeholder="Masukkan Nama Lengkap Anggota">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex space-x-1">
                            <!-- NIK Input -->
                            <div class="flex flex-col flex-grow form-group w-1/2">
                                <label for="identity_number">NIK</label>
                                <input id="identity_number" type="text" class="form-input" name="identity_number"
                                    wire:model="identity_number" placeholder="Masukkan NIK">
                                @error('identity_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Gender Input -->
                            <div class="flex flex-col flex-grow form-group w-1/2">
                                <label for="gender">Jenis Kelamin</label>
                                <div class="inline-flex items-center mt-1 gap-4">
                                    @foreach ($genders as $gender)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gender-{{ $gender->value }}" value="{{ $gender->value }}"
                                                wire:model.lazy="gender">
                                            <label class="form-check-label"
                                                for="gender-{{ $gender->value }}">{{ $gender->label }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="flex space-x-1">
                            <!-- Place Of Birth Input -->
                            <div class="flex flex-col flex-grow form-group w-1/2">
                                <label for="place_of_birth">Tempat Lahir</label>
                                <input id="place_of_birth" type="text" class="form-input" name="place_of_birth"
                                    wire:model="place_of_birth" placeholder="Masukkan Tempat Lahir Anggota">
                                @error('place_of_birth')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Date Of Birth Input -->
                            <div class="flex flex-col flex-grow form-group w-1/2">
                                <label for="date_of_birth">Tanggal Lahir</label>
                                <input id="date_of_birth" type="date" class="form-input" name="date_of_birth"
                                    wire:model="date_of_birth">
                                @error('date_of_birth')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Address Input -->
                        <div class="form-group">
                            <label for="address">Alamat Lengkap</label>
                            <input id="address" type="text" class="form-input" name="address" wire:model="address"
                                placeholder="Masukkan Alamat Lengkap Mitra">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex space-x-1">
                            <!-- Province Dropdown -->
                            <div class="flex flex-col flex-grow form-group w-1/2">
                                <label for="province">Provinsi</label>
                                <select class="form-input" name="province" id="province" wire:model="selectedProvince">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- District Dropdown -->
                            <div class="flex flex-col flex-grow form-group w-1/2">
                                <label for="regency">Kabupaten/Kota</label>
                                <select class="form-input" name="regency" id="regency" wire:model="selectedRegency">
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach ($regencies as $regency)
                                        <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex space-x-1">
                            <!-- Regency Dropdown -->
                            <div class="flex flex-col flex-grow form-group w-1/2">
                                <label for="district">Kecamatan</label>
                                <select class="form-input" name="district" id="district" wire:model="selectedDistrict">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Village Dropdown -->
                            <div class="flex flex-col flex-grow form-group w-1/2">
                                <label for="village">Desa/Kelurahan</label>
                                <select class="form-input" name="village" id="village" wire:model="selectedVillage">
                                    <option value="">Pilih Desa/Kelurahan</option>
                                    @foreach ($villages as $village)
                                        <option value="{{ $village->id }}">{{ $village->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 pb-1">Informasi Kontak</h5>
                    </div>

                    <div class="card-body">

                        <div class="relative h-20 w-20 overflow-hidden rounded-full bg-light cursor-pointer mb-4"
                            x-on:click="cropModal =! cropModal">
                            <img class="w-full h-full object-center object-cover" id="avatar-target"
                                src="{{ $oldAvatar }}" alt="" wire:ignore>
                            <div
                                class="bg-light absolute h-full w-full grid place-items-center opacity-0 hover:opacity-75 top-0 left-0 transition-all">
                                <i class="bx bx-pencil bxm"></i>
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-input" name="email"
                                wire:model="email" placeholder="Masukkan Nomor Identitas Mitra">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Phone Input -->
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input id="phone" type="text" class="form-input" name="phone"
                                wire:model="phone" placeholder="Masukkan Nomor Telepon Mitra">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="px-2 mt-4">
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
    <livewire:common::utils.avatar-cropper />
</div>

@push('script')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded with data: ', @json($users));
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinceSelect = document.getElementById('province');
            const regencySelect = document.getElementById('regency');
            const districtSelect = document.getElementById('district');
            const villageSelect = document.getElementById('village');

            // Event listener for province selection
            provinceSelect.addEventListener('change', function() {
                const provinceId = this.value;
                @this.call('loadRegenciesByProvince',
                    provinceId); // Call the method to load regencies based on province
            });

            // Event listener for regency selection
            regencySelect.addEventListener('change', function() {
                const regencyId = this.value;
                @this.call('loadDistrictsByRegency', regencyId); // Load districts based on selected regency
            });

            // Event listener for district selection
            districtSelect.addEventListener('change', function() {
                const districtId = this.value;
                @this.call('loadVillagesByDistrict',
                    districtId); // Load villages based on selected district
            });
        });
    </script>
@endpush
