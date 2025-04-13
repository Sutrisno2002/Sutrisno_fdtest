<div class="relative md:flex hidden">
    <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link p-2">
        <span class="sr-only">View notifications</span>
        <span class="flex items-center justify-center h-6 w-6">
            <i class="mgc_notification_line text-2xl"></i>
        </span>
    </button>
    <div
        class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-80 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg">

        <div class="p-2 border-b border-dashed border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <h6 class="text-sm">Notifikasi</h6>
                {{-- <a href="javascript: void(0);" class="text-gray-500 underline">
                    <small>Clear All</small>
                </a> --}}
            </div>
        </div>

        <div class="p-4 h-80" data-simplebar>
            {{-- @foreach ($notifications as $notif)
                <a href="javascript:void(0);" class="block mb-4" wire:click="setSeen('{{ $notif->id }}')">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                     class="flex justify-center items-center h-9 w-9 rounded-full bg text-white bg-blue-100 relative">
                                    @if (!$notif->isSeen())
                                        <div class="absolute text-[8px] text-primary -top-1 -left-1">
                                            <i class="bx bxs-circle"></i>
                                        </div>
                                    @endif
                                    <img class="w-6 h-6 max-w-6" src="{{ optional($notif->category)->icon }}"
                                         alt="">
                                </div>
                            </div>
                            <div class="flex-grow truncate ms-2">
                                <small
                                       class="font-normal text-gray-500 mb-1">{{ diffForHumans($notif->created_at) }}</small>
                                <h5 class="text-sm font-semibold mb-1">{{ $notif->title }}</h5>
                                <small class="noti-item-subtitle text-muted">
                                    {{ $notif->short_description }}
                                </small>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach --}}
        </div>

        <a href="{{ route('administrator.notification') }}"
            class="p-2 border-t border-dashed border-gray-200 dark:border-gray-700 block text-center text-primary underline font-semibold">
            Semua Notifikasi
        </a>
    </div>
</div>
