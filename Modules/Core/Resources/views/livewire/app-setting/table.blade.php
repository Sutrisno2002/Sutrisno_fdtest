<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            @foreach ($groups as $tab)
                <div class="list-group-item {{ $group == $tab->group ? 'btn-primary' : '' }}">
                    <a wire:click="$set('group', '{{ $tab->group }}')" href="javascript:void(0)"
                       class="btn bg-block text-left {{ $group == $tab->group ? 'btn-primary' : '' }}">
                        {{ Str::title(unSlug($tab->group)) }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-9">
        <div>
            @if (session()->has('success'))
                <x-common::utils.alert class="alert-primary">
                    {{ session()->get('success') }}
                </x-common::utils.alert>
            @endif

            @if (session()->has('error'))
                <x-common::utils.alert class="alert-warning">
                    {{ session()->get('error') }}
                </x-common::utils.alert>
            @endif

            <div class="card">
                <div class="card-body">

                    <div class="form-group row">
                        <div class="col-md-4 col-lg-3 ml-auto">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search" name="search"
                                       wire:model.lazy="search" placeholder="Pencarian...">
                            </div>
                        </div>
                    </div>

                    <x-admin.partials.table.with-filter :pagination="true" :disabled="[false]">
                        {{-- Table Header --}}
                        <x-slot name="table_headers">
                            @foreach ($headers as $header)
                                <x-admin.partials.table.cell :cell="$header['cell_name']" :isHeader="true" :sortable="$header['sortable']"
                                                             sortableOrder="{{ $header['column_name'] == $sort ? $order : null }}"
                                                             wire:click="sort('{{ $header['column_name'] }}')" />
                            @endforeach
                        </x-slot>

                        {{-- Table Body --}}
                        <x-slot name="table_body">
                            @forelse ($datas as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td style="width: 500px">
                                        <a class="btn bg-link" data-toggle="collapse"
                                           href="#{{ $data->key }}-{{ $loop->iteration }}" role="button"
                                           aria-expanded="false"
                                           aria-controls="{{ $data->key }}-{{ $loop->iteration }}">
                                            {{ $data->key }}
                                        </a>
                                        <div class="collapse" id="{{ $data->key }}-{{ $loop->iteration }}">
                                            <div class="card-body">
                                                @if ($data->type == 'image' && $data->value)
                                                    <img src="{{ url($data->value) }}" style="height: 80px"
                                                         alt="">
                                                @endif

                                                @if ($data->type == 'input')
                                                    <p class="m-0" style="max-width: 100%; white-space: normal;">
                                                        {!! $data->value !!}
                                                    </p>
                                                @endif

                                                @if (!$data->value)
                                                    <p class="m-0">-</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $data->type }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            {{-- @can('edit.appsetting') --}}
                                            <a class="btn btn-sm px-2 py-2 btn-light"
                                               href="{{ route('core.app-setting.edit', $data->id) }}">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            {{-- @endcan --}}
                                            {{-- @can('delete.appsetting') --}}
                                            <a class="btn btn-sm px-2 py-2 btn-light" href="javascript:void(0)"
                                               wire:click="$set('destroyId', '{{ $data->id }}')"
                                               data-toggle="modal" data-target="#remove-modal">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            {{-- @endcan --}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ count($headers) }}">
                                        <p class="text-center m-0">Tidak ada data yang ditampilkan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </x-slot>

                        {{-- Table Pagination --}}
                        <x-slot name="pagination">
                            <x-common::utils.pagination :paginator="$datas" />
                        </x-slot>
                    </x-admin.partials.table.with-filter>
                </div>
            </div>

            <x-common::utils.remove-modal />
        </div>
    </div>
</div>
