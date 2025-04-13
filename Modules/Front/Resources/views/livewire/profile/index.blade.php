<div x-data="{ cropModal: false }">
    <div class="w-full pt-20 px-6 flex flex-col md:flex-row gap-6">
        <div class="w-full md:w-1/3 flex flex-col gap-3">
            @foreach ($menus as $menu)
                <div class="card p-4 flex gap-4 cursor-pointer" wire:click="$set('section', '{{ $menu['key'] }}')">
                    <div class=" text-2xl flex justify-center items-center mx-2">
                        <i class='{{ $menu['icon'] }} '></i>
                    </div>
                    <div class="flex flex-col flex-grow">
                        <h4 class="wj kk wm cc">{{ $menu['label'] }}</h4>
                        <p>{{ $menu['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card w-full md:w-2/3 p-12">
            <form wire:submit.prevent="update">
                @switch($section)
                    @case('kta')
                        <div wire:loading.class="skeleton" wire:target="section">
                            <div class="flex flex-col">
                                <div class="flex justify-end">
                                    <div class="tc xf">
                                        <a href="javascript:void(0)" class="vc rg lk gh ml il hi gi _l">
                                            Download KTA
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-6 flex flex-col md:flex-row gap-6">
                                    <div class="flex w-full md:w-1/2 flex-col">
                                        <label class="rc ac wm">Depan</label>
                                        <img src="{{ url($oldAvatar) }}" class="w-full" alt="">
                                    </div>
                                    <div class="flex w-full md:w-1/2 flex-col">
                                        <label class="rc ac wm">Belakang</label>
                                        <img src="{{ url($oldAvatar) }}" class="w-full" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('profil')
                        <div wire:loading.class="skeleton" wire:target="section" >
                            <div class="relative h-40 w-40 overflow-hidden rounded-full bg-light cursor-pointer mb-4 mx-2"
                                x-on:click="cropModal =! cropModal">
                                <img class="w-full h-full object-center object-cover" id="avatar-target"
                                    src="{{ $oldAvatar }}" alt="" wire:ignore>
                                <div
                                    class="bg-light absolute h-full w-full grid place-items-center opacity-0 hover:opacity-75 top-0 left-0 transition-all">
                                    <i class="bx bx-pencil bxm"></i>
                                </div>
                            </div>
                            <div class="flex gap-6 mt-6">
                                <div class="w-1/2">
                                    <label for="name" class="rc ac wm">Nama Lengkap</label>
                                    <input id="name" class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" wire:model="name" type="text">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="w-1/2">
                                    <label for="name" class="rc ac wm">Email</label>
                                    <input id="name" class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" wire:model="email" type="text">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex mt-6 gap-6">
                                <div class="vd to/2 flex-grow">
                                    <label for="identity_number" class="rc ac wm">NIK</label>
                                    <input id="identity_number" type="text" class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" name="identity_number"
                                        wire:model="identity_number" placeholder="Masukkan No. KTP Anda">
                                    @error('identity_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="vd to/2 flex-grow">
                                    <label for="phone" class="rc ac wm">No. Telepon</label>
                                    <input id="phone" type="text" class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" name="phone" wire:model="phone"
                                        placeholder="Masukkan No. KTP Anda">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <div class="inline-flex items-center mt-1 gap-4">
                                        @foreach ($genders as $gender)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="gender-{{ $gender->value }}" value="{{ $gender->value }}"
                                                    wire:model.defer="gender">
                                                <label class="form-check-label"
                                                    for="gender-{{ $gender->value }}">{{ $gender->label }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="w-full mt-6">
                                <label for="address" class="rc ac wm">Alamat Lengkap</label>
                                <input id="address" type="text" class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" name="address" wire:model="address"
                                    placeholder="Masukkan Alamat Lengkap Anggota">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="flex space-x-1 mt-6 gap-6">
                                <!-- Province Dropdown -->
                                <div class="flex flex-col flex-grow w-1/2">
                                    <label for="province" class="rc ac wm">Provinsi</label>
                                    <select class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" name="province" id="province"
                                        wire:model.live="selectedProvince">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- District Dropdown -->
                                <div class="flex flex-col flex-grow w-1/2">
                                    <label for="regency" class="rc ac wm">Kabupaten/Kota</label>
                                    <select class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" name="regency" id="regency" wire:model.live="selectedRegency">
                                        <option value="">Pilih Kabupaten/Kota</option>
                                        @foreach ($regencies as $regency)
                                            <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex space-x-1 mt-6 gap-6">
                                <!-- Regency Dropdown -->
                                <div class="flex flex-col flex-grow w-1/2">
                                    <label for="district" class="rc ac wm">Kecamatan</label>
                                    <select class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" name="district" id="district"
                                        wire:model.live="selectedDistrict">
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Village Dropdown -->
                                <div class="flex flex-col flex-grow w-1/2">
                                    <label for="village" class="rc ac wm">Desa/Kelurahan</label>
                                    <select class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" name="village" id="village"
                                        wire:model.live="selectedVillage">
                                        <option value="">Pilih Desa/Kelurahan</option>
                                        @foreach ($villages as $village)
                                            <option value="{{ $village->id }}">{{ $village->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('password')
                        <div wire:loading.class="skeleton" wire:target="section">
                            <div class="vd to/2">
                                <label class="rc ac wm" for="oldPassword">Kata Sandi Lama</label>
                                <input type="password" name="oldPassword" id="oldPassword" placeholder="Masukkan Kata Sandi Lama"
                                    wire:model.defer="oldPassword" class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi">
                                @error('oldPassword')
                                    <small class="text-red-500">{{ ucfirst($message) }}</small>
                                @enderror
                            </div>
                            <div class="vd to/2 mt-6">
                                <label class="rc ac wm" for="newPassword">Kata Sandi Baru</label>
                                <input id="newPassword" type="password" name="newPassword"
                                    wire:model="newPassword" placeholder="Masukkan Kata Sandi Baru" class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi">
                                @error('newPassword')
                                    <small class="text-red-500">{{ ucfirst($message) }}</small>
                                @enderror
                            </div>
                            <div class="vd to/2 mt-6">
                                <label class="rc ac wm" for="newPassword_confirmation">Ulangi Kata Sandi Baru</label>
                                <input id="newPassword_confirmation" type="password"
                                    name="newPassword_confirmation" wire:model="newPassword_confirmation"
                                    placeholder="Masukkan Ulang Kata Sandi Baru" class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi">
                                @error('newPassword_confirmation')
                                    <small class="text-red-500">{{ ucfirst($message) }}</small>
                                @enderror
                            </div>

                        </div>
                    @break

                @endswitch

                @if ($section === 'profil' || $section === 'password')
                {{-- Save Button --}}
                <div class="px-2 mt-6 flex justify-start">
                    <div class="tc xf">
                        <button class="vc rg lk gh ml il hi gi _l" :disabled="false" :loading="true"
                            target="update">Simpan
                        </button>
                    </div>
                </div>    
                @endif
            </form>
        </div>
    </div>
    <livewire:common::utils.avatar-cropper />
</div>

@push('script')
    
@endpush
