<div>
    <form wire:submit.prevent="store">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-8/12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 pb-1">Informasi Role</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group-row flex-col md:flex-row">
                            <div class="form-group w-full md:w-6/12">
                                <label for="name">Role</label>
                                <input type="name" class="form-input" id="name" wire:model.defer="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group w-full md:w-6/12">
                                <label for="guard">Guard</label>
                                <select class="form-input capitalize" id="guard" wire:model.live="guard">
                                    @foreach ($guards as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @error('guard')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4 mx-2">

                        <div class="form-group">
                            <label class=" cursor-default">Permission</label>
                        </div>
                        <div class="form-group grid grid-cols-2 gap-3">
                            @foreach ($choosen_permissions as $group => $permissions)
                                @php
                                    $group_id = 'permission-' . $loop->iteration;
                                    $all_permissions = array_keys($permissions['data']);
                                    $choosen = array_keys(array_filter($permissions['data']));
                                @endphp
                                <div class="border rounded p-4">
                                    <label class="text-dark font-semibold capitalize flex items-center gap-2">
                                        <input class="form-check rounded text-primary" type="checkbox"
                                               wire:model.live="choosen_permissions.{{ $group }}.checked">
                                        {{ $group }} ({{ count($choosen) . '/' . count($permissions['data']) }})
                                    </label>
                                    <hr class="mt-2 mb-3">
                                    <div class="border-top border-light flex flex-wrap gap-2" id="{{ $group_id }}">
                                        @foreach ($permissions['data'] as $index => $permission)
                                            @php
                                                $explode = explode('+', $index);
                                                $permission_key = $group . '.data.' . $index;
                                            @endphp
                                            <label
                                                   class="capitalize inline-flex gap-1 items-center text-slate-500 font-normal">
                                                <input class="form-check rounded text-primary" type="checkbox"
                                                       wire:model.live="choosen_permissions.{{ $permission_key }}">
                                                {{ $explode[0] }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="p-2 text-end">
                            {{-- Save Button --}}
                            <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900" :disabled="false"
                                                    :loading="true" target="store">
                                Simpan
                            </x-common::utils.button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
