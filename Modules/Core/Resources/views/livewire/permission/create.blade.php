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
            <h5 class="card-title mb-0 pb-1">Tambah Permission</h5>
            <p>Tambahkan hak akses baru yang akan digunakan oleh user pada sistem ini.</p>
            <form wire:submit.prevent="store">
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
                        <label for="guard_name">Guard</label>
                        <input type="text" class="form-control" id="guard_name" wire:model.lazy="guard_name">
                        @error('guard_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Save Button --}}
                <x-common::utils.button class="btn bg-dark" :disabled="false" :loading="true" target="store">
                    Simpan
                </x-common::utils.button>
            </form>
        </div>
    </div>
</div>
