<?php

namespace Modules\Common\Observers;

use Modules\Common\Contracts\Cacheable;
use Modules\Common\Models\AppSetting;

class AppSettingObserver
{
    use Cacheable;

    /**
     * Handle the AppSetting "created" event.
     */
    public function created(AppSetting $appSetting): void
    {
        $this->updateCache($appSetting->key, $appSetting->value);
    }

    /**
     * Handle the AppSetting "updated" event.
     */
    public function updated(AppSetting $appSetting): void
    {
        $this->updateCache($appSetting->key, $appSetting->value);
    }

    /**
     * Handle the AppSetting "deleted" event.
     */
    public function deleted(AppSetting $appSetting): void
    {
        $this->removeCache($appSetting->key);
    }

    /**
     * Handle the AppSetting "restored" event.
     */
    public function restored(AppSetting $appSetting): void
    {
        //
    }

    /**
     * Handle the AppSetting "force deleted" event.
     */
    public function forceDeleted(AppSetting $appSetting): void
    {
        //
    }
}
