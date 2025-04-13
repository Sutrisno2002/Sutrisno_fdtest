<div>
    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>
        @forelse ($datas as $testimonial)
            <tr>
                <x-common::table.td>
                    <div
                         class="inline-block w-[12rem] h-[6rem] rounded border-2 border-white dark:border-gray-700 overflow-hidden me-2">
                        <img class="object-cover object-center w-full h-full" src="{{ $testimonial->avatar }}"
                             alt="testimonial {{ $testimonial->name }}">
                    </div>
                </x-common::table.td>
                <x-common::table.td>{{ $testimonial->name }}</x-common::table.td>
                <x-common::table.td>{{ $testimonial->message }}</x-common::table.td>
                <x-common::table.td>
                    <div class="flex items-center h-full gap-1">
                        <i class="bx bxs-star text-yellow-300 text-lg"></i> {{ $testimonial->rating }}
                    </div>
                </x-common::table.td>
                <x-common::table.td>
                    <div class="cursor-pointer inline" wire:click="showOrHide('{{ $testimonial->id }}')">
                        {!! $testimonial->showBadge() !!}
                    </div>
                </x-common::table.td>
                <x-common::table.td class="">
                    <div class="flex gap-2 justify-center align-center">
                        <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                           href="{{ route('administrator.testimonial.edit', $testimonial->id) }}">
                            <i class="bx bx-edit"></i>
                        </a>
                        <a class="btn bg-danger/25 text-danger hover:bg-danger hover:text-white px-2"
                           href="javascript:void(0)" wire:click="$set('destroyId', '{{ $testimonial->id }}')"
                           x-on:click="deleteConfirm =!deleteConfirm">
                            <i class="bx bx-trash"></i>
                        </a>
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
