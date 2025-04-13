<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Models\Page;

class PageRepo
{
    /**
     * Get all pages data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10, $paginated = true)
    {
        $pages = Page::query();

        if (isset($request->search)) {
            if ($request->search) {
                $pages->search($request);
            }
        }

        if (isset($request->onlyTrashed)) {
            if ($request->onlyTrashed) {
                $pages->onlyTrashed();
            }
        }

        if (!$paginated) {
            return $pages->sort($request)->orderBy('title', 'desc')->get();
        }

        return $pages->sort($request)->orderBy('title', 'desc')->paginate($total);
    }
}