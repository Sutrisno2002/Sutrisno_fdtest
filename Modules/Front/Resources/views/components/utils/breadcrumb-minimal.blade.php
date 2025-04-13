<section class="breadcrum-minimal relative shadow z-40 bg-white py-6 border-t border-slate-200">
    <div class="container">
        <h1 class="text-2xl text-slate-600">{{ $title }}</h1>

        @isset($description)
            <p class="text-slate-400 text-xs sm:text-sm">{{ $description }}</p>
        @endisset

        @isset($breadcrumb)
            <div class="breadcrumb">
                <span class="inline-flex">
                    <a href="{{ route('front.index') }}" class="transition-all hover:text-primary">
                        <i class="bx bx-home mr-1"></i>
                    </a>
                </span>

                @forelse ($pages as $page)
                    @if (!$loop->last)
                        <span>
                            <a href="{{ $page['link'] }}" class="transition-all hover:text-primary">
                                {{ $page['title'] }}
                            </a>
                        </span>
                    @else
                        <span>{{ $page['title'] }}</span>
                    @endif
                @empty
                @endforelse
            </div>
        @endisset
    </div>
</section>
