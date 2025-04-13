@extends('front::layouts.master')

@push('meta')
    <x-front::meta :title="cache('seo_judul_profil')" :description="cache('seo_description_profil')" :image="cache('seo_gambar_profil')" />
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
            <h2 class="fk vj pr kk wm on/5 gq/2 bb _b">{{ cache('profile.title') ?? 'Profil' }}</h2>
            <p class="bb on/5 wo/5 hq">
                {{ cache('profile.description') ??
                    'Informasi mengenai profil Anda.' }}
            </p>
        </div>
        <!-- Section Title End -->

        <livewire:front::profile.index :member="$member"/>
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
