<div x-show="deleteConfirm" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
     aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak x-show="deleteConfirm" x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
             aria-hidden="true"></div>

        <div x-cloak x-show="deleteConfirm" x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="inline-block w-[90%] max-w-xl overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl absolute top-[25%] left-1/2 translate-x-[-50%]">

            <div class="flex items-center justify-between space-x-4">
                <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        x-on:click="deleteConfirm = false" wire:click="cancelDestroy">
                    <i class="bx bx-x"></i>
                </button>
            </div>

            <div class="p-6 text-center">
                <i class="bx bx-info-circle text-5xl"></i>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    <span>Data akan dihapus secara permanen.</span><br>
                    <span>Apakah kamu yakin akan menghapus data ini?</span>
                </h3>

                <div class="flex flex-wrap gap-2 justify-center">
                    <button type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                            id="remove-button" wire:click="destroy" wire:loading.attr="disabled" wire:target="destroy">
                        Ya, Saya yakin
                        <div class="animate-spin inline-block ml-1 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full"
                             role="status" aria-label="loading" wire:loading wire:target="destroy">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                    <button type="button" wire:click="cancelDestroy" x-on:click="deleteConfirm = false"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
