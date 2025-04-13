<div x-show="replyModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true" wire:init="initModal">
    <div class="flex items-end justify-center min-h-screen px-4 text-center items-center sm:p-0">
        <div x-cloak x-show="editModal" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
            aria-hidden="true"></div>

        <div x-cloak x-show="editModal" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-xl my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">

            <div class="bg-light px-6 py-4 flex justify-between items-center {{ $loading ? 'skeleton' : null }}">
                <h5 class="modal-title">{{ $replied ? 'Lihat Balasan Pesan' : 'Balas Pesan' }}</h5>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    x-on:click="replyModal = false" wire:click="closeModal">
                    <i class="bx bx-x"></i>
                </button>
            </div>

            <form wire:submit.prevent="update" class="p-6 {{ $loading ? 'skeleton' : null }}"
                wire:loading.class="skeleton" wire:target="update">
                <div class="form-group">
                    <label for="email">{{ $replied ? 'Terkirim kepada' : 'Balas kepada' }}</label>
                    <input type="text" class="form-input" name="email" id="email" wire:model.lazy="email"
                        {{ $replied ? 'disabled' : null }}>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subjek</label>
                    <input type="text" class="form-input" name="subject" id="subject" wire:model.lazy="subject"
                        {{ $replied ? 'disabled' : null }}>
                    @error('subject')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="form-group">
                    <label for="reply">Pesan</label>
                    <textarea type="text" class="form-input" id="reply" wire:model.defer="reply" {{ $replied ? 'disabled' : null }}></textarea>
                    @error('reply')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex justify-end gap-2 mt-4 pt-4 border-t">
                    @if (!$replied)
                        <button type="button" class="btn bg-gray-100 hover:bg-gray-200" x-on:click="replyModal = false"
                            wire:click="closeModal">
                            Batal
                        </button>
                        {{-- Save Button --}}
                        <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900" :disabled="false"
                            :loading="true" target="update">
                            Kirim
                        </x-common::utils.button>
                    @else
                        <button type="button" class="btn bg-gray-100 hover:bg-gray-200" x-on:click="replyModal = false"
                            wire:click="closeModal">
                            Tutup
                        </button>
                    @endif
                </div>
            </form>

        </div>
    </div>
</div>
