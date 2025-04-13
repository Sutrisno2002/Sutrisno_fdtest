<x-mail::layout>
    {{-- Header --}}
    <x-slot:header>
        <x-mail::header :url="config('app.url')">
            @php
                // Ambil logo dari cache atau gunakan logo default jika tidak valid
                $logo = cache('logo');
                $logoPath = $logo && file_exists($logo) ? $logo : asset('assets/default/images/logo.png');
            @endphp

            <img src="{{ url($logoPath) }}" style="height: 100px" alt="Logo {{ cache('app_name') }}">

        </x-mail::header>
    </x-slot:header>

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        <x-slot:subcopy>
            <x-mail::subcopy>
                {{ $subcopy }}
            </x-mail::subcopy>
        </x-slot:subcopy>
    @endisset

    {{-- Footer --}}
    <x-slot:footer>
        <x-mail::footer>
            {{ cache('copyright') }}
        </x-mail::footer>
    </x-slot:footer>
</x-mail::layout>
