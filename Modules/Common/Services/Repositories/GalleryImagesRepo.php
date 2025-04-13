<?php

namespace Modules\Common\Services\Repositories;

use Carbon\Carbon;
use Modules\Volunteers\Models\GalleryImages;

class GalleryImagesRepo
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
        $galleryimages = GalleryImages::query();

        if (isset($request->search)) {
            if ($request->search) {
                $galleryimages->search($request);
            }
        }

        if (isset($request->onlyTrashed)) {
            if ($request->onlyTrashed) {
                $galleryimages->onlyTrashed();
            }
        }

        if (isset($request->date_start) && isset($request->date_end)) {
            if ($request->date_start && $request->date_end) {
                $dateStart = date('Y-m-d 00:00:00', strtotime($request->date_start));
                $dateEnd = date('Y-m-d 23:59:59', strtotime($request->date_end));
                $galleryimages->whereBetween('transaction_date', [$dateStart, $dateEnd]);
            }
        }

        return $galleryimages->sort($request)->paginate($total);
    }
}
