<div>
    @if (!$groups->isEmpty())
        <div class="card mb-3">
            <div class="px-4 md:px-6">
                <nav class="flex space-x-3 border-b overflow-x-auto overflow-y-hidden" aria-label="Tabs">
                    @foreach ($groups as $tab)
                        @php
                            $active = $group == $tab->slug_group ? 'active' : '';
                        @endphp
                        <button type="button" wire:click="$set('group', '{{ $tab->slug_group }}')"
                                class="fc-tab-active:font-semibold fc-tab-active:border-primary fc-tab-active:text-primary py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent -mb-px text-sm whitespace-nowrap text-gray-500 hover:text-primary {{ $active }}">
                            {{ Str::title(unSlug($tab->slug_group)) }}
                        </button>
                    @endforeach
                </nav>

            </div>
        </div>
    @endif

    <x-common::table.table :custom-table="$table" :datas="$datas" :sort="$sort" :order="$order" searchable>
        @forelse ($datas as $content)
            <tr>
                <x-common::table.td>
                    <p class="capitalize font-bold">{{ $content->label }}</p>
                    <small class="text-slate-400">{{ $content->key }}</small>
                </x-common::table.td>

                <x-common::table.td>
                    @if ($content->type == 'image' && $content->value)
                        <img src="{{ url($content->value) }}" style="height: 80px" alt="">
                    @endif

                    @if (($content->type == 'input' || $content->type == 'textarea' || $content->type == 'editor') && $content->value)
                        <p class="m-0 overflow-hidden" style="max-width: 100%; white-space: normal; max-height: 100px">
                            @if (filter_var($content->value, FILTER_VALIDATE_URL))
                                <a class="text-primary" href="{{ $content->value }}"
                                   target="_blank">{{ $content->value }}</a>
                            @elseif (filter_var($content->value, FILTER_VALIDATE_EMAIL))
                                <a class="text-primary" href="mailto:{{ $content->value }}">{{ $content->value }}</a>
                            @else
                                {!! $content->value !!}
                            @endif
                        </p>
                    @endif

                    @if (!$content->value)
                        <p class="m-0">-</p>
                    @endif
                </x-common::table.td>

                <x-common::table.td class="flex gap-2 justify-center">
                    @can('update.setting-content', 'web')
                        <a class="btn bg-light/75 text-slate-400 hover:bg-light hover:text-slate-600 px-2"
                           href="{{ route('administrator.content.edit', $content->id) }}">
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
