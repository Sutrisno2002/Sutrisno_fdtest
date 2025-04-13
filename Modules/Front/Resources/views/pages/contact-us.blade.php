@extends('front::layouts.master')

@push('meta')
    <x-front::meta :title="cache('seo_judul_hubungi_kami')" :description="cache('seo_description_hubungi_kami')" :image="cache('seo_gambar_hubungi_kami')" />
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
    <livewire:front::contact-us />
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
