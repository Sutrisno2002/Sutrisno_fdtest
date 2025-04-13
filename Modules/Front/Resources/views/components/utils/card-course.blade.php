<div class="card course">
    <div class="wrapper">
        <div class="thumbnail">
            <a href="{{ route('front.course.show-course', $course->slug) }}">
                <img src="{{ $course->getThumbnail() }}" alt="Gambar {{ $course->name }}">
            </a>
            <div class="thumbnail-badge">
                <span class="bg-white text-slate-500">
                    <a href="javascript:void(0)" wire:click="$set('category', '{{ optional($course->category)->slug }}')">
                        {{ optional($course->category)->name }}</a>
                </span>

                <span class="star">
                    <i class="bx bxs-star mr-1"></i>{{ $course->total_ratings }}
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="thumbnail-badge optional mb-2">
                <span class="bg-light text-slate-500">
                    <a href="javascript:void(0)"
                       wire:click="$set('category', '{{ optional($course->category)->slug }}')">
                        {{ optional($course->category)->name }}</a>
                </span>

                <span class="star">
                    <i class="bx bxs-star mr-1"></i>{{ $course->total_ratings }}
                </span>
            </div>
            <a href="{{ route('front.course.show-course', $course->slug) }}">
                <ul class="features">
                    <li>
                        <i class="bx bx-time mr-1"></i> {{ $course->getDuration(true) }}
                    </li>
                    <li>
                        <i class="bx bx-book-open mr-1"></i> {{ $course->total_lessons }} Materi
                    </li>
                </ul>
                <div class="price">
                    @if ($course->discount_price)
                        <small class="text-danger/50">
                            <del>{{ price($course->price, true) }}</del>
                        </small>
                    @endif
                    <span class="text-slate-600 font-semibold"> {{ $course->getPrice() }}</span>
                </div>

                <h2>
                    {{ $course->name }}
                </h2>
            </a>
        </div>
    </div>
    <div class="grid grid-cols-8 gap-2 px-4 pb-6">
        {{-- <a href="javascript:void(0)" class="btn outline-light col-span-1 !py-1 self-center h-full"
               wire:click="addToWishlist">
                <i class="bx bx-heart scale-150 mt-2"></i>
            </a> --}}
        @auth('customer')
            <a href="javascript:void(0)"
               class="btn outline-light col-span-2 !py-1 self-center h-full flex items-center justify-center"
               wire:click="addToCart('{{ $course->id }}')">
                <i class="bx bx-cart-add"></i>
            </a>
            <x-front::utils.button class="btn primary col-span-6 !py-1 md:!py-3" wire.loading.class="skeleton"
                                   target="processToCheckoutFromCourse('{{ $course->id }}')"
                                   wire:click="processToCheckoutFromCourse('{{ $course->id }}')">
                <div class="grid grid-cols-5 gap-2">
                    <span class="col-span-5 text-center text-sm">
                        Beli Kelas
                        <div wire:loading wire:target="processToCheckoutFromCourse('{{ $course->id }}')">
                            <div class="animate-spin inline-block ml-1 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full"
                                 role="status" aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </span>
                </div>
            </x-front::utils.button>
        @else
            <a href="{{ route('customer.login.form', ['next' => request()->url()]) }}"
               class="btn outline-light col-span-2 !py-1 self-center h-full flex items-center justify-center"
               wire:click="addToCart('{{ $course->id }}')">
                <i class="bx bx-cart-add"></i>
            </a>
            <a href="{{ route('customer.login.form', ['next' => request()->url()]) }}"
               class="btn primary col-span-6 !py-1 md:!py-3">
                <div class="grid grid-cols-5 gap-2">
                    <span class="col-span-5 text-center text-sm">Beli Kelas</span>
                </div>
            </a>
        @endauth
    </div>
</div>
