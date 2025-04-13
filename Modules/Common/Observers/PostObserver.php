<?php

namespace Modules\Common\Observers;

use Modules\Common\Contracts\Cacheable;
use Modules\Common\Models\Post;
use Modules\Common\Services\ImageService;

class PostObserver
{
    use Cacheable;

    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        if ($post->getOriginal('thumbnail') !== $post->thumbnail) {
            (new ImageService)->removeImage('images', $post->getOriginal('thumbnail'));
        }
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        if ($post->thumbnail) {
            (new ImageService)->removeImage('images', $post->thumbnail);
        }
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
