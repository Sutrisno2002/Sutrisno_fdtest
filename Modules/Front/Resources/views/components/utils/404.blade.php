<div {{ $attributes->merge(['class' => 'rounded bg-white px-6 py-14 text-center']) }}>
    <img class="w-[200px] m-auto mb-8" src="{{ cache('image_not_found') }}" alt="Not Found">
    <p class="font-normal w-[75%] max-w-[400px] m-auto">
        {{ $slot }}
    </p>
</div>
