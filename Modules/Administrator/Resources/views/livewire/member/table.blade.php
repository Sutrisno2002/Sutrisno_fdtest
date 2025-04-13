<div x-data="{
    deleteConfirm: false,
    createModal: false,
    editModal: false,
    detailModal: false,
    verifyModal: false,
    filterModal: false
}">
    <div class="card">
        <nav class="px-4 md:px-6 flex space-x-3 border-b" aria-label="Tabs">
            @foreach ($statuses as $statusItem)
                @php
                    $active = $verify == $statusItem['value'] ? 'verified' : 'not_verified';
                @endphp
                <button type="button" wire:click="$set('verify', '{{ $statusItem['value'] }}')"
                    class="fc-tab-active:font-semibold fc-tab-active:border-primary fc-tab-active:text-primary py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent -mb-px text-sm whitespace-nowrap text-gray-500 hover:text-primary {{ $active }}">
                    {{ $statusItem['label'] }}
                </button>
            @endforeach
        </nav>

        <div class="p-6">
            <div class="flex flex-wrap justify-end gap-2 md:gap-4">
                @can('blast.member', 'web')
                    <a href="{{ route('administrator.member.blast') }}"
                        class="btn bg-primary hover:bg-sky-700 text-white rounded-full">
                        <i class='bx bx-mail-send bx-xs me-1'></i> Kirim KTA
                    </a>
                @endcan
                <a href="javascript:void(0)" class="btn bg-dark hover:bg-gray-600 text-white rounded-full"
                    x-on:click="filterModal = !filterModal">
                    <i class='bx bxs-filter-alt me-1'></i> Filter
                </a>
                <div class="w-full sm:w-full md:w-4/12 lg:w-3/12 relative">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" name="search" wire:model.lazy="search" class="form-input pl-11"
                        placeholder="Pencarian...">
                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
                        <i class="bx bx-search"></i>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="filterModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-40">
        </div>
        <div x-show="filterModal" x-cloak x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-full" x-on:click.away="filterModal = false"
            class="z-50 fixed bg-white font-semibold flex flex-col h-screen top-0 right-0 sm:w-80 w-full">
            <div class="flex justify-between items-center px-6 py-4 border-b text-lg">
                Filter
                <span class="cursor-pointer text-2xl" x-on:click="filterModal = false">
                    <i class='bx bx-x'></i>
                </span>
            </div>

            <div class="p-4">
                <form wire:submit.prevent="filter">

                    <div class="flex flex-col">
                        <div class="form-group">
                            <select class="form-input w-full bg-gray-100" wire:model.defer="age">
                                <option value="">Semua Umur</option>
                                @php
                                    $ranges = [
                                        // the start of each age-range.
                                        '17-26',
                                        '27-42',
                                        '43-58',
                                        '59-68',
                                        '69-77',
                                        '78-95',
                                        '96-101',
                                    ];
                                @endphp
                                @foreach ($ranges as $range)
                                    <option value="{{ $range }}">
                                        {{ $range }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-input w-full bg-gray-100" wire:model.defer="gender">
                                <option value="">Semua Jenis Kelamin</option>
                                @php
                                    $genders = ['pria', 'wanita'];
                                @endphp

                                @foreach ($genders as $gender)
                                    <option value="{{ $gender }}">
                                        {{ ucfirst($gender) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-input w-full bg-gray-100" name="province" id="province"
                                wire:model.defer="selectedProvince">
                                <option value="">Semua Provinsi</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-input w-full bg-gray-100" name="regency" id="regency"
                                wire:model.defer="selectedRegency">
                                <option value="">Semua Kabupaten/Kota</option>
                                @foreach ($regencies as $regency)
                                    <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-input w-full bg-gray-100" name="district" id="district"
                                wire:model.defer="selectedDistrict">
                                <option value="">Semua Kecamatan</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-input w-full bg-gray-100" name="village" id="village"
                                wire:model.defer="selectedVillage">
                                <option value="">Semua Kelurahan/Desa</option>
                                @foreach ($villages as $village)
                                    <option value="{{ $village->id }}">{{ $village->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex px-4 flex-col gap-2">
                        <span x-on:click="filterModal = false">
                            <x-common::utils.button class="w-full btn bg-primary text-white hover:bg-sky-700"
                                :disabled="false" :loading="true" target="filter">
                                <i class='bx bxs-filter-alt me-2'></i>Terapkan
                            </x-common::utils.button>
                        </span>
                        <button wire:click="resetFilters" class="w-full btn bg-gray-500 text-white hover:bg-gray-600"
                            type="button">
                            <i class='bx bx-reset me-2'></i>Reset Filter
                            <div wire:loading wire:target="resetFilters"
                                class="animate-spin inline-block ms-1 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full"
                                aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 {{ !$datas->isEmpty() ? 'sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4' : '' }} gap-4 mb-5"
                wire:target="status">
                @forelse ($datas as $data)
                    <div class="card h-full relative" wire:loading.class="animate-pulse pointer-events-none">
                        <div class="absolute w-full flex justify-end p-3">
                            <x-common::utils.dropdown>
                                <x-slot name="item">

                                    @if (!$data->verified_at)
                                        <x-common::utils.dropdown-item href="javascript:void(0)"
                                            wire:click="verification('{{ $data->id }}')"
                                            x-on:click="verifyModal =!verifyModal">
                                            <i class="w-4 h-4 me-3 bx bx-check-circle"></i>
                                            Verifikasi
                                        </x-common::utils.dropdown-item>
                                    @endif

                                    @can('publish.member', 'web')
                                        <x-common::utils.dropdown-item wire:click="archive('{{ $data->id }}')">
                                            <i
                                                class="w-4 h-4 me-3 bx bx-{{ $data->status == 'active' ? 'archive-in' : 'upload' }}"></i>
                                            {{ $data->status == 'active' ? 'Non Aktifkan' : 'Aktifkan' }}
                                        </x-common::utils.dropdown-item>
                                    @endcan

                                    @can('show.member', 'web')
                                        <x-common::utils.dropdown-item href="javascript:void(0)"
                                            wire:click="detail('{{ $data->id }}')"
                                            x-on:click="detailModal =!detailModal">
                                            <i class="w-4 h-4 me-3 bx bx-info-circle"></i>
                                            Detail
                                        </x-common::utils.dropdown-item>
                                    @endcan

                                    @can('update.member', 'web')
                                        <x-common::utils.dropdown-item
                                            href="{{ route('administrator.member.edit', $data->id) }}">
                                            <i class="w-4 h-4 me-3 bx bx-edit"></i>
                                            Edit
                                        </x-common::utils.dropdown-item>
                                    @endcan

                                    @can('delete.member', 'web')
                                        <x-common::utils.dropdown-item
                                            wire:click="$set('destroyId', '{{ $data->id }}')"
                                            x-on:click="deleteConfirm =!deleteConfirm">
                                            <i class="w-4 h-4 me-3 bx bx-trash"></i>
                                            Hapus
                                        </x-common::utils.dropdown-item>
                                    @endcan
                                </x-slot>
                            </x-common::utils.dropdown>
                        </div>

                        <div class="p-6 md:p-4 mb-4" style="min-height: 180px">
                            <div class="flex justify-between items-end mb-4">
                                <div class="flex flex-grow">
                                    <img class="w-20 h-20 rounded-full object-cover object-center shadow-md"
                                        src="{{ $data->avatar ? url($data->avatar) : 'https://via.placeholder.com/600x400/181818/ddd?text=' . $data->avatar }}"
                                        alt="">
                                </div>

                                <div class="badge soft-info">{{ $data->gender }}</div>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-500 dark:text-white-400">
                                    {{ $data->identity_number }}
                                </p>
                                <!-- Left Content -->
                                <h5 class="text-md font-bold text-gray-800 dark:text-white">
                                    {{ $data->name }} ({{ age($data->date_of_birth) }})
                                </h5>

                                <!-- Right Content -->
                                <p class="text-gray-500 dark:text-white-400 mb-3">
                                    {{ $data->fullAddress() }}
                                </p>
                            </div>
                            {!! $data->verifiedBadge() !!}
                            {!! $data->statusBadge() !!}
                        </div>

                    </div>
                @empty
                    <div class="w-full pt-3 pb-3">
                        <div class="form-input py-3">
                            <p class="text-center m-0">Anggota yang kamu cari tidak kami temukan.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <x-common::utils.pagination :paginator="$datas" />

        </div>
    </div>

    @if ($member)
        <div x-show="verifyModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
            role="dialog" aria-modal="true">
            <div class="flex justify-center min-h-screen px-4 text-center items-center sm:p-0">
                <div x-cloak x-show="verifyModal" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                <div x-cloak x-show="verifyModal" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-2xl my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl ">

                    <div class="bg-light px-6 py-4 flex justify-between items-center">
                        <h5 class="modal-title">Verifikasi Data Anggota</h5>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            x-on:click="verifyModal = false" wire:click="closeModal">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="p-6">
                        {{-- <div class="text-center p-6">
                            <div class="animate-spin inline-block ml-1 w-5 h-5 border-[2px] border-current border-t-transparent rounded-full "
                                role="status" aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div> --}}

                        <!-- Member Data: Show when data is loaded -->
                        <div class="w-full mb-6">
                            <p class="text-xl font-bold">{{ $member->name }}</p>
                            <p class="text-sm sm:text-base text-gray-700">{{ $member->fullAddress() }}</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="flex flex-col">
                                <div class="flex flex-grow mb-3">
                                    <img class="w-32 h-32 rounded object-cover object-center shadow-md"
                                        src="{{ $member->avatar ? url($member->avatar) : 'https://via.placeholder.com/600x400/181818/ddd?text=' . $member->avatar }}"
                                        alt="{{ $member->name }}">
                                </div>

                                <div class="flex">
                                    @if ($member->verified_at)
                                        <div class="badge soft-primary">Verified</div>
                                    @elseif (!$member->verified_at)
                                        <div class="badge soft-warning">Not Verified</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-span-2 space-y-2">
                                <div class="flex justify-between">
                                    <span class="font-semibold">NIK</span>
                                    <span>{{ $member->identity_number }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold">Tanggal Lahir</span>
                                    <span>{{ birth_date($member->date_of_birth) }}
                                        ({{ age($member->date_of_birth) }})</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold">Jenis Kelamin</span>
                                    <span>{{ $member->gender }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold">No. Telepon</span>
                                    <span>{{ $member->phone }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold">Email</span>
                                    <span>{{ $member->email }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold">Status Akun</span>
                                    <span>{{ $member->status == 'active' ? 'Aktif' : 'Non Aktif' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Close Button -->
                        <div class="flex justify-end gap-2 mt-4 pt-4 border-t">
                            <button type="button" class="btn bg-gray-100 hover:bg-gray-200"
                                x-on:click="verifyModal = false" wire:click="closeModal">
                                Tutup
                            </button>
                            <button type="button" class="btn bg-success text-white" x-on:click="verifyModal = false"
                                wire:click="verificationMember('{{ $member->id }}')">
                                Verifikasi
                                <div class="animate-spin inline-block ms-1 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full"
                                    role="status" aria-label="loading" wire:loading
                                    wire:target="verificationMember">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- <livewire:administrator::member.create /> --}}
    {{-- <livewire:administrator::member.verify /> --}}
    <livewire:administrator::member.detail />
    <x-common::utils.remove-modal />
</div>

@push('script')
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
