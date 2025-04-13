<div class="full-width bg-bg-2">
    <div class="text-center px-5 pt-[74px] pb-[30px]">
        <h2 class="font-bold font-chivo text-[28px] leading-[32px] md:text-heading-2 mb-[22px]">Hubungi Kami</h2>
        <p class="text-text text-gray-500 mx-auto md:w-[49ch]">Silakan isi formulir di bawah ini untuk menghubungi kami.
        </p>
    </div>
    <div
        class="bg-gray-100 relative p-[40px] md:pt-[91px] md:pr-[98px] md:pb-[86px] md:pl-[92px] mt-[150px] rounded-[58px]">
        <div class="mx-auto relative max-w-[1320px]">
            <h2 class="font-bold font-chivo text-[25px] leading-[30px] md:text-heading-3 mb-[22px]">Ada proyek yang ingin
                Anda diskusikan?</h2>
            <p class="text-text text-gray-600 mb-[30px] md:mb-[60px]">Langkah yang tepat pada waktu yang tepat dapat
                menyelamatkan investasi Anda. Wujudkan impian untuk mengembangkan bisnis Anda.</p>
            <div class="flex flex-col gap-8 mb-[15px] md:mb-[25px] lg:flex-row lg:gap-[50px] xl:gap-[98px]">
                <div class="w-1/3">
                    <div class="flex items-center gap-[13px] mb-[15px] md:mb-[25px]"> <i> <img
                                class="rounded-2xl max-w-[240px] max-h-[340px]"
                                src="{{ cache('contact_us.cta.image') ?? asset('assets/default/images/logo.png') }}"
                                alt="Logo"></i>
                        <p class="text-heading-6 font-bold font-chivo">{{ cache('contact_us.title') ?? 'Hubungi Kami' }}
                        </p>
                    </div>
                    <p class="text-text text-gray-600">
                        {{ cache('contact_us.description') ??
                            'Kami berkomitmen untuk memberikan pelayanan terbaik. Jika Anda memiliki pertanyaan, kebutuhan, atau
                                                                                                                                                                                                                                                                                                                            ingin mendapatkan informasi lebih lanjut, silakan isi formulir di bawah ini.' }}
                    </p>
                </div>
                <form wire:submit.prevent="sendMessage" wire:key="{{ randAlpha() }}" class="flex-1">
                    @if (session()->has('success'))
                        <p class="text-md text-green-500">{{ session('success') }}</p>
                    @endif
                    @if (session()->has('error'))
                        <p class="text-md text-red-500">{{ session('error') }}</p>
                    @endif
                    <div class="flex flex-col gap-6 mb-6 lg:flex-row xl:gap-[30px]">
                        <input
                            class="outline-none flex-1 placeholder:text-gray-400 placeholder:text-md placeholder:font-chivo py-5 px-[30px]"
                            type="text" placeholder="Masukkan nama lengkap Anda" wire:model.defer="name">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <input
                            class="outline-none flex-1 placeholder:text-gray-400 placeholder:text-md placeholder:font-chivo py-5 px-[30px]"
                            type="email" placeholder="Alamat Email" wire:model.defer="email">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-6 mb-6 lg:flex-row xl:gap-[30px]">
                        <input
                            class="outline-none flex-1 placeholder:text-gray-400 placeholder:text-md placeholder:font-chivo py-5 px-[30px]"
                            type="text" placeholder="No HP / Whatsapp" wire:model.defer="whatsapp_number">
                        @error('whatsapp_number')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input
                            class="outline-none flex-1 placeholder:text-gray-400 placeholder:text-md placeholder:font-chivo py-5 px-[30px]"
                            type="text" placeholder="Subjek" wire:model.defer="subject">
                        @error('subject')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <textarea class="w-full py-5 resize-none outline-0 px-[30px] max-h-[150px] mb-[35px] md:mb-[56px]"
                        placeholder="Tulis pesan Anda di sini" rows="4" wire:model.defer="message"></textarea>
                    <div class="flex flex-col gap-5">
                        @error('message')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <button
                            class="flex items-center transition-colors duration-200 px-[22px] py-[15px] lg:px-[32px] lg:py-[22px] rounded-[50px] font-chivo font-semibold text-md md:text-lg text-white bg-gray-900 w-fit"
                            type="submit">Kirim Pesan<i> <img class="ml-[7px] w-[12px] filter-white"
                                    src="{{ asset('assets/front/agon/images/icons/icon-right.svg') }}"
                                    alt="arrow right icon"></i></button>
                        <div wire:loading class="flex items-center">
                            <span class="loader"></span>
                            <span class="ml-2">Mengirim...</span>
                        </div>
                        <p class="text-md text-gray-500">Dengan mengklik tombol kirim pesan, Anda setuju dengan syarat
                            dan
                            kebijakan kami.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
