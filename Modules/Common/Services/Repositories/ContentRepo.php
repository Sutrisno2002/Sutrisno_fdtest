<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Models\Content;

class ContentRepo
{
    /**
     * Get all contents data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $contents = Content::query();

        if (isset($request->groups)) {
            if (count($request->groups) > 0) {
                $contents->whereIn('slug_group', $request->groups);
            }
        }

        if (isset($request->search)) {
            if ($request->search) {
                $contents->search($request);
            }
        }

        if (isset($request->term)) {
            if ($request->term) {
                $contents->where('key', 'regexp', str_replace(' ', '_', $request->term));
            }
        }

        if (isset($request->onlyTrashed)) {
            if ($request->onlyTrashed) {
                $contents->onlyTrashed();
            }
        }

        if (isset($request->slug_group)) {
            if ($request->slug_group) {
                $contents->group($request);
            }
        }

        return $contents->sort($request)->paginate($total);
    }

    /**
     * Find settings by group column
     *
     * @param  string $group
     * @return void
     */
    public function findByGroup(string $group, $total = 10, $paginated = false)
    {
        $contents = Content::query()->where('slug_group', $group);

        if ($paginated) {
            return $contents->paginate($total);
        }

        return $contents->get();
    }

    /**
     * Get group column
     *
     * @param  int $total
     * @param  boolean $paginated
     * @return Content
     */
    public function getGroupField($groups = [], int $total = 10, $paginated = false)
    {
        $contents = Content::query()->groupByGroup()->orderBy('slug_group');

        if (count($groups) > 0) {
            $contents->whereIn('slug_group', $groups);
        }

        if ($paginated) {
            return $contents->paginate($total);
        }

        return $contents->get();
    }
}
