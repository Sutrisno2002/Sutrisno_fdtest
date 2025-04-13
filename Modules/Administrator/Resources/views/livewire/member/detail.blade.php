<div x-show="detailModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true" wire:init="initModal">
    <div class="flex justify-center min-h-screen px-4 text-center items-center sm:p-0">
        <div x-cloak x-show="detailModal" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
            aria-hidden="true"></div>

        <div x-cloak x-show="detailModal" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-2xl my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl ">

            <div class="bg-light px-6 py-4 flex justify-between items-center">
                <h5 class="modal-title">Detail Anggota</h5>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    x-on:click="detailModal = false" wire:click="closeModal">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="p-6">
                <div class="text-center p-6 {{ $member ? 'hidden' : '' }}">
                    <div class="animate-spin inline-block ml-1 w-5 h-5 border-[2px] border-current border-t-transparent rounded-full "
                        role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <!-- Member Data: Show when data is loaded -->
                <div class="w-full mb-6">
                    <p class="text-md font-bold">{{ $member_number }}</p>
                    <p class="text-xl font-bold">{{ $name }}</p>
                    <p class="text-sm sm:text-base text-gray-700">{{ $address }}</p>
                </div>

                <!-- Flex layout for member details -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 {{ !$member ? 'hidden' : '' }}">
                    <div class="flex flex-col">
                        <div class="rounded-md w-32 h-32 object-cover mb-3"
                            style="background-image: url({{ $avatar ? url($avatar) : 'https://via.placeholder.com/600x400/181818/ddd?text=' . $avatar }});">
                        </div>
                        <div class="flex">
                            @if ($verified_at)
                                <div class="badge soft-primary">Verified</div>
                            @elseif (!$verified_at)
                                <div class="badge soft-warning">Not Verified</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-span-2 space-y-2">
                        <div class="flex justify-between">
                            <span class="font-semibold">NIK</span>
                            <span>{{ $identity_number }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Tempat Lahir</span>
                            <span>{{ $place_of_birth }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Tanggal Lahir</span>
                            <span>{{ birth_date($date_of_birth) }} ({{ age($date_of_birth) }})</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Jenis Kelamin</span>
                            <span>{{ $gender }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">No. Telepon</span>
                            <span>{{ $phone }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Email</span>
                            <span>{{ $email }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Status Akun</span>
                            <span>{{ $status == 'active' ? 'Aktif' : 'Non Aktif' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Close Button -->
                <div class="flex justify-end gap-2 mt-4 pt-4 border-t">
                    <button type="button" class="btn bg-gray-100 hover:bg-gray-200" x-on:click="detailModal = false"
                        wire:click="closeModal">
                        Tutup
                    </button>
                </div>
            </div>


        </div>
    </div>
</div>
