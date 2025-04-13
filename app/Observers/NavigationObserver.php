<?php

namespace App\Observers;

use Modules\Administrator\Models\Navigation;
use Modules\Common\Contracts\Cacheable;

class NavigationObserver
{
    use Cacheable;

    /**
     * Handle the Navigation "created" event.
     *
     * @param  \App\Navigation  $navigation
     * @return void
     */
    public function created(Navigation $navigation)
    {
        $this->updateCache('navigations', Navigation::all());
    }

    /**
     * Handle the Navigation "updated" event.
     *
     * @param  \App\Navigation  $navigation
     * @return void
     */
    public function updated(Navigation $navigation)
    {
        $this->updateCache('navigations', Navigation::all());
    }

    /**
     * Handle the Navigation "deleted" event.
     *
     * @param  \App\Navigation  $navigation
     * @return void
     */
    public function deleted(Navigation $navigation)
    {
        $this->updateCache('navigations', Navigation::all());
    }

    /**
     * Handle the Navigation "restored" event.
     *
     * @param  \App\Navigation  $navigation
     * @return void
     */
    public function restored(Navigation $navigation)
    {
        //
    }

    /**
     * Handle the Navigation "force deleted" event.
     *
     * @param  \App\Navigation  $navigation
     * @return void
     */
    public function forceDeleted(Navigation $navigation)
    {
        //
    }
}
