<div x-data="{
    deleteConfirm: false,
}">
    <div class="card mb-6">
        <div class="card-header">
            <div class="card-title">
                <h5>Informasi</h5>
            </div>

        </div>
        <div class="card-body">
            <div class="flex flex-col space-y-2">
                <p><i class="bx bx-calendar"></i> {{ getFullDate($data->date) }}</p>
                <h4 class="text-black">
                    {{ $data->title }}
                </h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5>Media</h5>
            </div>

        </div>
        <div class="card-body">
            <div class="flex gap-6 flex-wrap">
                @foreach ($data->images as $item)
                    <div class="relative">
                        <div class="absolute w-full flex justify-end p-3">
                            @can('delete.gallery', 'web')
                                <a title="Hapus" href="javascript:void(0)"
                                    class="{{ $data->images->count() == 1 ? 'hidden' : '' }}"
                                    wire:click="$set('destroyId', '{{ $item->id }}')"
                                    x-on:click="deleteConfirm =!deleteConfirm">
                                    <div
                                        class="absolute right-3 top-3 rounded-full flex justify-center items-center w-8 h-8 drop-shadow-md bg-gray-100 hover:bg-gray-300 transition-all duration-300">
                                        <i class="bx bx-trash text-md text-gray-500"></i>
                                    </div>
                                </a>
                            @endcan
                        </div>
                        <img class="h-40 rounded-md object-contain" src="{{ url($item->path) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-common::utils.remove-modal />
</div>
