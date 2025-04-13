<div x-data="{
    replyModal: false
}">
    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>
        @forelse ($datas as $guestmessage)
            <tr>
                <x-common::table.td>{{ $guestmessage->name }}</x-common::table.td>
                <x-common::table.td>{{ $guestmessage->email }}</x-common::table.td>
                <x-common::table.td>{{ phone($guestmessage->whatsapp_number, 'ID') }}</x-common::table.td>
                <x-common::table.td>{{ $guestmessage->subject }}</x-common::table.td>
                <x-common::table.td>{{ $guestmessage->message }}</x-common::table.td>
                <x-common::table.td>
                    <div class="cursor-pointer inline" wire:click="seenOrUnseen('{{ $guestmessage->id }}')">
                        {!! $guestmessage->showBadge() !!}
                    </div>
                </x-common::table.td>
                <x-common::table.td class="">
                    <div class="flex gap-2 justify-center align-center">
                        @can('create.guest_message', 'web')
                            @if ($guestmessage->reply)
                                <a class="btn bg-success/25 text-slate-50 hover:bg-white hover:text-slate-600 px-2"
                                   href="javascript:void()" wire:click="replied('{{ $guestmessage->id }}')"
                                   x-on:click="replyModal =!replyModal">
                                    <i class="bx bx-check"></i>
                                </a>
                            @else
                                <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                                   href="javascript:void()" wire:click="reply('{{ $guestmessage->id }}')"
                                   x-on:click="replyModal =!replyModal">
                                    <i class="bx bx-reply"></i>
                                </a>
                            @endif
                        @endcan
                        @can('delete.guest_message', 'web')
                            <a class="btn bg-danger/25 text-danger hover:bg-danger hover:text-white px-2"
                               href="javascript:void(0)" wire:click="$set('destroyId', '{{ $guestmessage->id }}')"
                               x-on:click="deleteConfirm =!deleteConfirm">
                                <i class="bx bx-trash"></i>
                            </a>
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

    <livewire:administrator::guest-message.reply />
</div>
