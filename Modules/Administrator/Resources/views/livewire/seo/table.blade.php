<div>
    @if (!$groups->isEmpty())
        <div class="card mb-3 xl:max-w-[calc(100vw-300px)]">
            <div class="px-4 md:px-6">
                <nav class="flex space-x-3 border-b overflow-x-auto overflow-y-hidden" aria-label="Tabs">
                    @foreach ($groups as $tab)
                        @php
                            $active = $group == $tab ? 'active' : '';
                        @endphp
                        <button type="button" wire:click="$set('group', '{{ $tab }}')"
                                class="fc-tab-active:font-semibold fc-tab-active:border-primary fc-tab-active:text-primary py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent -mb-px text-sm whitespace-nowrap text-gray-500 hover:text-primary {{ $active }}">
                            {{ Str::title(unSlug($tab)) }}
                        </button>
                    @endforeach
                </nav>

            </div>
        </div>
    @endif

    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>
        @forelse ($datas as $seo)
            <tr>
                <x-common::table.td>
                    <p class="capitalize font-bold">{{ $seo->name }}</p>
                    <small class="text-slate-400">{{ $seo->key }}</small>
                </x-common::table.td>

                <x-common::table.td>
                    @if ($seo->type == 'image' && $seo->value)
                        <img src="{{ url($seo->value) }}" style="height: 80px" alt="">
                    @endif

                    @if (($seo->type == 'input' || $seo->type == 'textarea' || $seo->type == 'editor') && $seo->value)
                        <p class="m-0 overflow-hidden" style="max-width: 100%; white-space: normal; max-height: 100px">
                            @if (filter_var($seo->value, FILTER_VALIDATE_URL))
                                <a class="text-primary" href="{{ $seo->value }}"
                                   target="_blank">{{ $seo->value }}</a>
                            @elseif (filter_var($seo->value, FILTER_VALIDATE_EMAIL))
                                <a class="text-primary" href="mailto:{{ $seo->value }}">{{ $seo->value }}</a>
                            @else
                                {!! $seo->value !!}
                            @endif
                        </p>
                    @endif

                    @if (!$seo->value)
                        <p class="m-0">-</p>
                    @endif
                </x-common::table.td>

                <x-common::table.td class="flex gap-2 justify-center">
                    @can('update.setting-seo', 'web')
                        <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                           href="{{ route('administrator.setting.seo.edit', $seo->id) }}">
                            <i class="bx bx-edit"></i>
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
