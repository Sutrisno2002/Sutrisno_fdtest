<div>
    <form wire:submit.prevent="update">
        <div class="grid md:grid-cols-5">
            <div class="col-span-1 md:col-span-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 pb-1">Tentang Testimonial</h5>
                    </div>

                    <div class="card-body">

                        <div class="form-group grid grid-cols-1 sm:grid-cols-2">
                            <div class="col-span-1">
                                <livewire:common::utils.filepond :oldValue="$oldAvatar" />

                                @error('avatar')
                                    <small class="text-danger">{{ $message }}</small>
                                @else
                                    <small class="text-muted"><em>Format: .png, .jpg, .jpeg. Ratio: 1:1</em></small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group-row grid grid-cols-1 sm:grid-cols-2 gap-x-2">
                            {{-- Name --}}
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-input" id="name" wire:model.lazy="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Rating --}}
                            <div class="form-group">
                                <label for="description">Rating</label>
                                <div class="rating">
                                    <input type="radio" id="star5" class="rate" wire:model.lazy="rate"
                                           name="rating" value="5" />
                                    <label for="star5" title="star 5"></label>
                                    <input type="radio" id="star4" class="rate" wire:model.lazy="rate"
                                           name="rating" value="4" />
                                    <label for="star4" title="star 4"></label>
                                    <input type="radio" id="star3" class="rate" wire:model.lazy="rate"
                                           name="rating" value="3" />
                                    <label for="star3" title="star 3"></label>
                                    <input type="radio" id="star2" class="rate" wire:model.lazy="rate"
                                           name="rating" value="2">
                                    <label for="star2" title="star 2"></label>
                                    <input type="radio" id="star1" class="rate" wire:model.lazy="rate"
                                           name="rating" value="1" />
                                    <label for="star1" title="star 1"></label>
                                </div>
                                @error('rate')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Pesan --}}
                        <div class="form-group">
                            <label for="message">Komentar</label>
                            <textarea type="text" class="form-input" id="message" wire:model.defer="message"></textarea>
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="flex items-center">
                                <input type="checkbox" class="form-switch me-2" id="show_in_homepage"
                                       name="show_in_homepage" wire:click="$toggle('show_in_homepage')"
                                       {{ $show_in_homepage ? 'checked' : '' }}>
                                <label class="text-gray-800 text-sm font-medium inline-block"class="custom-control-label"
                                       for="show_in_homepage">Tampilkan testimoni di halaman beranda?</label>
                            </div>
                        </div>

                        <div class="p-2 text-end">
                            {{-- Save Button --}}
                            <x-common::utils.button class="btn bg-dark text-white hover:bg-slate-900" :disabled="false"
                                                    :loading="true" target="update">
                                Simpan
                            </x-common::utils.button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
