<div>

    <div class="flex gap-2 mt-4 py-4 border-t">
        <button type="button" class="btn bg-dark text-white" wire:click="markAll" wire:target="bulkSendEmail">
            Pilih Semua ({{ $datas->count() }})
            <div class="animate-spin inline-block ms-1 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full"
                role="status" aria-label="loading" wire:loading wire:target="markAll">
                <span class="sr-only">Loading...</span>
            </div>
        </button>
        @can('blast.member', 'web')
        <button type="button" class="btn bg-success text-white" wire:click="bulkSendEmail" wire:target="bulkSendEmail">
            <i class='bx bx-mail-send bx-xs me-1'></i> Kirim KTA
            <div class="animate-spin inline-block ms-1 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full"
                role="status" aria-label="loading" wire:loading wire:target="bulkSendEmail">
                <span class="sr-only">Loading...</span>
            </div>
        </button>    
        @endcan
    </div>


    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>
        @forelse ($datas as $data)
            <tr wire:key="blast-{{ $data->id }}">
                <x-common::table.td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="bulkMarker-{{ $data->id }}"
                            wire:model="bulkMarker" name="bulkMarker[]" value="{{ $data->id }}"
                            aria-labelledby="bulkMarkerLabel-{{ $data->id }}">

                        <label class="form-check-label ms-1" for="bulkMarker-{{ $data->id }}"
                            id="bulkMarkerLabel-{{ $data->id }}">
                            {{ $data->name }}
                        </label>
                    </div>

                </x-common::table.td>
                <x-common::table.td>{{ $data->email }}</x-common::table.td>
                <x-common::table.td>{{ dateTimeTranslated($data->created_at) }}</x-common::table.td>
                <x-common::table.td class="">
                    <div class="flex gap-2 justify-center align-center">
                        {{-- <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                            href="{{ route('administrator.member.previewKTA', $data->id) }}">
                            <i class="bx bx-show"></i>
                        </a> --}}
                        @can('blast.member', 'web')
                        <button class="btn bg-primary btn-sm text-white" wire:click="sendEmail('{{ $data->id }}')">
                            <i class="bx bx-envelope mr-2"></i>Kirim KTA
                            <div class="animate-spin inline-block ms-1 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full"
                                role="status" aria-label="loading" wire:loading
                                wire:target="sendEmail('{{ $data->id }}')">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                        @endcan
                    </div>

                </x-common::table.td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($table->columns) }}">
                    <p class="text-center p-4">
                        Data yang kamu cari, tidak kami ditemukan.
                    </p>
                </td>
            </tr>
        @endforelse
    </x-common::table.table>
</div>
