<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Models\Testimonial;

class TestimonialRepo
{
    /**
     * Get all public testimonial data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function getPublicTestimonials(object $request, $total = 10)
    {
        $testimonial = Testimonial::query()->where('show_in_homepage', true);

        if (isset($request->search)) {
            if ($request->search) {
                $testimonial->search($request);
            }
        }

        if (isset($request->category)) {
            if ($request->category) {
                $testimonial->category($request);
            }
        }

        return $testimonial->sort($request)->paginate($total);
    }

    /**
     * Get all testimonial data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $testimonial = Testimonial::query();

        if (isset($request->search)) {
            if ($request->search) {
                $testimonial->search($request);
            }
        }

        return $testimonial->sort($request)->paginate($total);
    }
}
