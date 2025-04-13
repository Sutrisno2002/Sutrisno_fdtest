@extends('front::layouts.master')

@push('meta')
    <x-front::meta :title="$page->title" :description="$page->short_description" :image="cache('seo_gambar_beranda')" :keyword="cache('seo_keyword_beranda')" />
@endpush

@push('style')
@endpush

@section('content')
    <section class="full-width bg-white mx-[12px] md:mx-[36px] mt-[70px]">
        <div>
            <div class="text-center">
                <h2 class="font-chivo font-bold text-[28px] leading-[32px] mb-[20px]">{{ $page->title }}</h2>
            </div>
            <div class="container mx-auto text-center mb-[20px]">
                <span class="font-chivo font-semibold">{{ $page->short_description }}</span>
            </div>

            <div class="container mx-auto ml-[10]">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <div class="col-span-1 lg:col-span-8" id="page-content">
                        <article class="prose result leading-snug max-w-screen-lg space-y-6">
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('assets/front/js/vendor/markdown-parser.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const result = document.querySelector('.result');
            const content = document.querySelector('#page-description');
            result.innerHTML = marked.parse(@json($page->description));

            const replaceText = (key, value) => {
                return result.innerHTML = result.innerHTML.replaceAll('{' + key + '}', value);
            }
        })
    </script>
@endpush
