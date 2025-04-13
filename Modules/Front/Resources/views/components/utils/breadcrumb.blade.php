@php
    $pages = isset($pages) ? $pages : [];
    $breadcrumb = isset($withBreadcrumb) ? true : false;
    $disableShape = isset($disableShape) ? true : false;
@endphp
<section class="bg-blue-50 pt-36 pb-28 relative">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-6 justify-center">
            <div class="lg:col-start-2 lg:col-span-4 text-center">
                <h1 class="text-5xl/relaxed text-gray-700">{{ $title }}</h1>
                @isset($description)
                    <p class="mb-6 md:text-lg text-gray-500">
                        {{ $description }}
                    </p>
                @endisset

                @if ($breadcrumb)
                    <div class="breadcrumb">
                        <span class="inline-flex items-center">
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
                @endif
            </div>
        </div>
    </div>

    @if (!$disableShape)
        <div class="absolute -bottom-1 w-full">
            <svg class="w-full h-full" viewBox="0 0 1440 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="shape-b" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="curve" fill="#fff">
                        <path d="M0,30.013 C239.659,10.004 479.143,0 718.453,0 C957.763,0 1198.28,10.004 1440,30.013 L1440,40 L0,40 L0,30.013 Z"
                              id="Path">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    @endif
</section>
