<div>
    @if (!$groups->isEmpty())
        <div class="card mb-3">
            <div class="px-4 md:px-6">
                <nav class="flex space-x-3 border-b overflow-x-auto overflow-y-hidden" aria-label="Tabs">
                    @foreach ($groups as $tab)
                        @php
                            $active = $group == $tab->group ? 'active' : '';
                        @endphp
                        <button type="button" wire:click="$set('group', '{{ $tab->group }}')"
                                class="fc-tab-active:font-semibold fc-tab-active:border-primary fc-tab-active:text-primary py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent -mb-px text-sm whitespace-nowrap text-gray-500 hover:text-primary {{ $active }}">
                            {{ Str::title(unSlug($tab->group)) }}
                        </button>
                    @endforeach
                </nav>

            </div>
        </div>
    @endif

    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>
        @forelse ($datas as $setting)
            <tr>
                <x-common::table.td>
                    <p class="capitalize font-bold">{{ $setting->name }}</p>
                    <small class="text-slate-400">{{ $setting->key }}</small>
                </x-common::table.td>

                <x-common::table.td>
                    @if ($setting->type == 'image' && $setting->value)
                        <img src="{{ url($setting->value) }}" style="height: 80px" alt="">
                    @endif

                    @if (($setting->type == 'input' || $setting->type == 'textarea' || $setting->type == 'editor') && $setting->value)
                        <p class="m-0 overflow-hidden" style="max-width: 100%; white-space: normal; max-height: 100px">
                            @if (filter_var($setting->value, FILTER_VALIDATE_URL))
                                <a class="text-primary" href="{{ $setting->value }}"
                                   target="_blank">{{ $setting->value }}</a>
                            @elseif (filter_var($setting->value, FILTER_VALIDATE_EMAIL))
                                <a class="text-primary" href="mailto:{{ $setting->value }}">{{ $setting->value }}</a>
                            @else
                                {!! $setting->value !!}
                            @endif
                        </p>
                    @endif

                    @if (!$setting->value)
                        <p class="m-0">-</p>
                    @endif
                </x-common::table.td>

                <x-common::table.td class="flex gap-2 justify-center">
                    @can('update.setting-main', 'web')
                        <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                           href="{{ route('administrator.setting.main.edit', $setting->id) }}">
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
