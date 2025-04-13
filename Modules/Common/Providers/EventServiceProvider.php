<?php

namespace Modules\Common\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Common\Models\AppSetting;
use Modules\Common\Models\Content;
use Modules\Common\Models\Post;
use Modules\Common\Observers\AppSettingObserver;
use Modules\Common\Observers\ContentObserver;
use Modules\Common\Observers\PostObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        AppSetting::observe(AppSettingObserver::class);
        Content::observe(ContentObserver::class);
        Post::observe(PostObserver::class);
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        //
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
