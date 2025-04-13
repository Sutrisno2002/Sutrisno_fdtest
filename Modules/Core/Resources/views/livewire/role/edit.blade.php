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

    <form wire:submit.prevent="update">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0 pb-1">Edit Role</h5>
                        <p>Perbarui data peran yang telah digunakan oleh user pada sistem ini.</p>
                        <div class="form-row">
                            {{-- Name --}}
                            <div class="form-group col-md-6">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" wire:model.defer="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Guard --}}
                            <div class="form-group col-md-6">
                                <label for="guard">Guard</label>
                                <input type="text" class="form-control" id="guard" wire:model.lazy="guard">
                                @error('guard')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Save Button --}}
                        <x-common::utils.button class="btn bg-dark" :disabled="false" :loading="true" target="update">
                            Simpan
                        </x-common::utils.button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0 pb-1">Permission</h5>
                        <p>Berikan hak akses terhadap peran pengguna pada sistem.</p>

                        <div class="row mb-3 justify-content-end">
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Cari group permission..."
                                       data-action="findPermission">
                            </div>
                        </div>

                        <div id="accordion">
                            @foreach ($permissions as $groupKey => $group)
                                <div class="card accordion-item" accordion-parent="parent-{{ $groupKey }}">
                                    <div class="card-header" id="heading-{{ $groupKey }}">
                                        <div data-toggle="collapse" data-target="#child-{{ $groupKey }}"
                                             aria-expanded="true" aria-controls="{{ $groupKey }}">
                                            <div class="form-group text-capitalize">
                                                <input class="form-checkbox rounded text-primary parent-checkbox"
                                                       type="checkbox" id="groups.{{ $groupKey }}"
                                                       data-target="#child-{{ $groupKey }}"
                                                       wire:model.defer="groups.{{ $groupKey }}">
                                                <label class="custom-control-label" for="groups.{{ $groupKey }}">
                                                    {{ unslug($groupKey) }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="child-{{ $groupKey }}" class="collapse {{ !$loop->first ?: 'show' }}"
                                         aria-labelledby="heading-{{ $groupKey }}" data-parent="#accordion">
                                        <div class="card-body" accordion-child="child-{{ $groupKey }}">
                                            @foreach ($group as $permKey => $permission)
                                                <div class="form-group d-inline mr-2">
                                                    <input class="form-checkbox rounded text-primary child-checkbox"
                                                           type="checkbox"
                                                           id="permissions.{{ $groupKey }}.{{ $permKey }}"
                                                           name="permissions.{{ $groupKey }}.{{ $permKey }}"
                                                           data-target="child-{{ $groupKey }}"
                                                           data-accordion="parent-{{ $groupKey }}"
                                                           wire:model.defer="permissions.{{ $groupKey }}.{{ $permKey }}">
                                                    <label class="custom-control-label"
                                                           for="permissions.{{ $groupKey }}.{{ $permKey }}">
                                                        {{ $permKey }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('script')
    <script>
        $('.parent-checkbox').change(function() {
            const $this = $(this);
            const target = $this.data('target');
            const siblings = $(`${target}`).find('.child-checkbox');
            let datas = [];

            siblings.each(function(i, e) {
                datas.push($(e).attr('wire:model.defer'))
                if ($this.is(':checked')) {
                    datas.forEach(data => {
                        @this.set(data, true)
                    })
                } else {
                    datas.forEach(data => {
                        @this.set(data, false)
                    })
                }
            })

        })

        $.each($('.child-checkbox'), function() {
            const $this = $(this).change(function() {
                const parent = $this.data('accordion');
                const siblings = $this.parents(`[accordion-child]`).find('.child-checkbox');
                const target = siblings.data('target');
                let checkedSiblings = 0;

                siblings.each(function(i, e) {
                    if ($(e).is(':checked')) {
                        checkedSiblings += 1
                    }
                })

                if (checkedSiblings == siblings.length) {
                    $(`[accordion-parent="${parent}"]`).find('.parent-checkbox').prop('checked', true)
                    $(`[accordion-parent="${parent}"]`).find('.parent-checkbox').val(true)
                } else {
                    $(`[accordion-parent="${parent}"]`).find('.parent-checkbox').prop('checked', false)
                    $(`[accordion-parent="${parent}"]`).find('.parent-checkbox').val(false)
                }
            })
        })

        $('[data-action="findPermission"]').keyup(function() {
            let accordions = document.querySelectorAll('.accordion-item')
            let search_query = $(this).val();
            for (var i = 0; i < accordions.length; i++) {
                if (accordions[i].innerText.toLowerCase().includes(search_query.toLowerCase())) {
                    accordions[i].classList.remove("d-none");
                } else {
                    accordions[i].classList.add("d-none");
                }
            }
        })
    </script>
@endpush
