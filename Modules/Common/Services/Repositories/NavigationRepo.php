<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Contracts\ArrayPagination;
use Modules\Common\Models\Navigation;

class NavigationRepo
{
    use ArrayPagination;

    public function findByModule($module_name)
    {
        return Navigation::where('module', $module_name)->get();
    }

    /**
     * Get last position by specific navigation
     *
     * @param  string $tableReference
     * @return void
     */
    public function getParentLastPosition(object $request)
    {
        $navigation = Navigation::query();
        return $navigation->getParentLastPosition($request)->first();
    }

    /**
     * Get last position by specific parent
     *
     * @param  string $tableReference
     * @return void
     */
    public function getChildLastPosition(object $request)
    {
        $navigation = Navigation::query();
        return $navigation->getChildLastPosition($request)->first();
    }

    /**
     * Get get parent navigations
     *
     * @return void
     */
    public function getParentNavigations()
    {
        $parentNavigations = Navigation::query()->orderBy('sort_order')
            ->whereNull('parent_id');

        return $parentNavigations->get();
    }

    /**
     * Get child navigations
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function getChilds(object $request, $total = 10)
    {
        $parent = Navigation::where('slug', $request->slug)->first();

        if ($parent) {
            $childs = Navigation::where('parent_id', $parent->id)->orderBy('sort_order');

            if (isset($request->search)) {
                if ($request->search) {
                    $childs->search($request);
                }
            }

            return $childs->paginate($total);
        }

        return $this->paginate([]);
    }

    /**
     * Get all navigations data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $navigations = Navigation::query()->whereNull('parent_id');

        if (isset($request->placement)) {
            if ($request->placement) {
                $navigations->where('placement', $request->placement);
            }
        }

        if (isset($request->search)) {
            if ($request->search) {
                $navigations->search($request);
            }
        }

        if (isset($request->navigation)) {
            if ($request->navigation) {
                $navigations->navigation($request);
            }
        }

        return $navigations->sort($request)->paginate($total);
    }
}
