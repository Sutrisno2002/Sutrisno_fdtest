<div>
    @if (session()->has('success'))
        <x-common::utils.alert class="primary mb-3" icon="bx bx-check-circle" title="Sukses!" dismissable>
            {{ session()->get('success') }}
        </x-common::utils.alert>
    @endif

    @if (session()->has('error'))
        <x-common::utils.alert class="warning mb-3" icon="bx bx-info-circle" title="Upss.. Tampaknya ada yang salah"
                               dismissable>
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
                    @forelse ($datas as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>{{ dateTimeTranslated($role->created_at) }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    @can('edit.role')
                                        <a class="btn btn-sm px-2 py-2 btn-light"
                                           href="{{ route('core.role.edit', $role->id) }}">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    @endcan
                                    @can('delete.role')
                                        <a class="btn btn-sm px-2 py-2 btn-light" href="javascript:void(0)"
                                           wire:click="$set('destroyId', '{{ $role->id }}')" data-toggle="modal"
                                           data-target="#remove-modal">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    @endcan
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
