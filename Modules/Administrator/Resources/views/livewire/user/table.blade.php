<div>
    <div class="mb-4">
        <div class="card p-4 shadow-md rounded-lg">
            <div class="flex items-center space-x-2">
                <label for="verified_filter" class="text-sm font-medium text-gray-700">Status Verifikasi:</label>
                <select id="verified_filter" wire:model.lazy="verifiedFilter"
                    class="form-select rounded-md shadow-sm mt-1 block w-auto">
                    <option value="">Semua</option>
                    <option value="verified">Terverifikasi</option>
                    <option value="unverified">Belum Terverifikasi</option>
                </select>
            </div>
        </div>
    </div>
    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>
        @forelse ($datas as $user)
            <tr>
                <x-common::table.td>
                    <div class="flex items-center">
                        <div
                            class="inline-block h-8 w-8 rounded-full border-2 border-white dark:border-gray-700 overflow-hidden me-2">
                            <img class="object-cover object-center w-full h-full" src="{{ $user->getAvatar() }}"
                                alt="Image Description">
                        </div>
                        <span class="whitespace-nowrap">{{ $user->name }}</span>
                    </div>
                </x-common::table.td>
                <x-common::table.td>{{ $user->email }}</x-common::table.td>
                <x-common::table.td>{!! $user->verifiedBadge() !!}</x-common::table.td>
                <x-common::table.td>{!! $user->activeBadge() !!}</x-common::table.td>
                <x-common::table.td>{!! $user->roleBadges() !!}</x-common::table.td>
                <x-common::table.td>{{ dateTimeTranslated($user->created_at) }}</x-common::table.td>
                <x-common::table.td class="flex gap-2 justify-center">
                    @can('update.user', 'web')
                        <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                            href="{{ route('administrator.user.edit', $user->id) }}">
                            <i class="bx bx-edit"></i>
                        </a>
                    @endcan
                    @can('delete.user', 'web')
                        <a class="btn bg-danger/25 text-danger hover:bg-danger hover:text-white px-2"
                            href="javascript:void(0)" wire:click="$set('destroyId', '{{ $user->id }}')"
                            x-on:click="deleteConfirm =!deleteConfirm">
                            <i class="bx bx-trash"></i>
                        </a>
                    @endcan
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
