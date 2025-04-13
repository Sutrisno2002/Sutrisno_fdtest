<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Models\Slider;

class SliderRepo
{
    /**
     * Get all sliders data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $sliders = Slider::query();

        if (isset($request->search)) {
            if ($request->search) {
                $sliders->search($request);
            }
        }

        if (isset($request->onlyTrashed)) {
            if ($request->onlyTrashed) {
                $sliders->onlyTrashed();
            }
        }

        if (isset($request->is_show)) {
            if ($request->is_show) {
                $sliders->isShow($request);
            }
        }

        return $sliders->sort($request)->paginate($total);
    }

    /**
     * Get public banners
     *
     * @return void
     */
    public function getPublicSliders()
    {
        return Slider::query()
            ->where('is_active', 1)
            ->orderBy('position')
            ->get();
    }

    /**
     * Get public banners
     *
     * @return void
     */
    public function getPublicSlider()
    {
        return Slider::query()
            ->where('is_active', 1)
            ->orderBy('position')
            ->first();
    }
}
