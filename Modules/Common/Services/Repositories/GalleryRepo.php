<?php

namespace Modules\Common\Services\Repositories;

use Carbon\Carbon;
use Modules\Volunteers\Models\Gallery;

class GalleryRepo
{
    /**
     * Get all pages data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 12, $paginated = true)
    {
        $gallerys = Gallery::query()->with('images');

        if (isset($request->search)) {
            if ($request->search) {
                $gallerys->search($request);
            }
        }

        if (isset($request->search)) {
            if ($request->search) {
                $gallerys->search($request);
            }
        }

        if (isset($request->date_start) && isset($request->date_end)) {
            if ($request->date_start && $request->date_end) {
                $dateStart = date('Y-m-d 00:00:00', strtotime($request->date_start));
                $dateEnd = date('Y-m-d 23:59:59', strtotime($request->date_end));
                $gallerys->whereBetween('date', [$dateStart, $dateEnd]);
            }
        }

        if (!$paginated) {
            return $gallerys->orderBy('date', 'desc')->get();
        }

        return $gallerys->sort($request)->orderBy('date', 'desc')->paginate($total);
    }

    public function getLatestPosts($total = 5)
    {
        $posts = Gallery::with('creator');
        return $posts->orderBy('date', 'desc')->paginate($total);
    }
}
