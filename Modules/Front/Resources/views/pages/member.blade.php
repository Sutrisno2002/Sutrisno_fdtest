@extends('front::layouts.master')

@push('meta')
    <x-front::meta :title="cache('seo_judul_register')" :description="cache('seo_description_register')" :image="cache('seo_gambar_register')" />
@endpush

@push('style')
    <style>
        .opacity-0 {
            opacity: 0;
        }

        .translate-x-5 {
            transform: translateX(1.25rem);
            /* Adjust as needed */
        }
    </style>
@endpush

@section('content')
    <section class="gj qp gr hj rp hr">

        <!-- Section Title Start -->
        <div class="animate_top bb ze rj ki xn vq" data-sr-id="38"
            style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 2.8s cubic-bezier(0.5, 0, 0, 1), transform 2.8s cubic-bezier(0.5, 0, 0, 1);">
            <h2 class="fk vj pr kk wm on/5 gq/2 bb _b">{{ cache('registration.title') ?? 'Daftar Relawan GPJ' }}</h2>
            <p class="bb on/5 wo/5 hq">
                {{ cache('registration.description') ?? 'Bergabunglah dengan kami Relawan Gibran Penerus Jokowi (GPJ). Isi formulir di bawah ini untuk menjadi bagian
                dari tim kami yang berdedikasi.' }}
            </p>
        </div>
        <!-- Section Title End -->

        <div class="wo/4 sm:w-full i va bb yee ki xn wq jb mo">
            <div class="uf sn tf rn un zf xl:gap-10">
                <livewire:front::member.register />
            </div>
            {{-- <div class="uf sn tf rn un zf xl:gap-10 p-16 flex justify-center items-center">
                <div class="tc sf yo ap zf ep qb flex justify-center items-center gap-10">
                    <div class="vd to/2">
                        <img src="{{ asset('assets/default/images/kta/SAMPLE-KTA-GPJ-1.jpg') }}" alt="Logo"
                            class="om w-300" />
                    </div>
                    <div class="vd to/2">
                        <img src="{{ asset('assets/default/images/kta/SAMPLE-KTA-GPJ-2.jpg') }}" alt="Logo"
                            class="om w-300" />
                    </div>
                </div>
            </div> --}}

        </div>
    </section>

    <x-front::cta_registration />
@endsection

@push('script')
    <script>
        function dismissAlert() {
            const alertElement = document.getElementById('dismiss-alert');
            alertElement.classList.add('opacity-0', 'translate-x-5'); // Add animation classes
            setTimeout(() => {
                alertElement.remove(); // Remove the element after animation
            }, 300); // Match the duration of the CSS animation
        }
    </script>
@endpush
