<div class="card course">
    <div class="thumbnail">
        <a href="{{ route('front.blog.show', $post->slug_title) }}">
            <img src="{{ $post->getThumbnail() }}" alt="Gambar {{ $post->name }}">
        </a>
        <div class="thumbnail-badge">
            <span class="bg-white text-slate-500">
                <a href="javascript:void(0)" wire:click="$set('category', '{{ optional($post->category)->slug }}')">
                    {{ optional($post->category)->name }}</a>
            </span>
        </div>
    </div>
    <div class="card-body">
        <div class="thumbnail-badge optional mb-2">
            <span class="bg-light text-slate-500">
                <a href="javascript:void(0)" wire:click="$set('category', '{{ optional($post->category)->slug }}')">
                    {{ optional($post->category)->name }}</a>
            </span>
        </div>
        <a href="{{ route('front.blog.show', $post->slug_title) }}">
            <h2>
                {{ $post->title }}
            </h2>
            <p class="description">{{ $post->subject }}</p>
        </a>
    </div>
</div>
