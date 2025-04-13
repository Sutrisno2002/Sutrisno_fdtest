<?php

namespace Modules\Common\Observers;

use Modules\Common\Contracts\Cacheable;
use Modules\Common\Models\Content;

class ContentObserver
{
    use Cacheable;

    /**
     * Handle the Content "created" event.
     */
    public function created(Content $appSetting): void
    {
        $this->updateCache($appSetting->key, $appSetting->value);
    }

    /**
     * Handle the Content "updated" event.
     */
    public function updated(Content $appSetting): void
    {
        $this->updateCache($appSetting->key, $appSetting->value);
    }

    /**
     * Handle the Content "deleted" event.
     */
    public function deleted(Content $appSetting): void
    {
        $this->removeCache($appSetting->key);
    }

    /**
     * Handle the Content "restored" event.
     */
    public function restored(Content $appSetting): void
    {
        //
    }

    /**
     * Handle the Content "force deleted" event.
     */
    public function forceDeleted(Content $appSetting): void
    {
        //
    }
}
