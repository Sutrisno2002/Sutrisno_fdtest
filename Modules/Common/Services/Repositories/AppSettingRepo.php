<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Models\AppSetting;

class AppSettingRepo
{
    /**
     * Get all appsettings data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $appsettings = AppSetting::query();

        if (isset($request->groups)) {
            if (count($request->groups) > 0) {
                $appsettings->whereIn('group', $request->groups);
            }
        }

        if (isset($request->search)) {
            if ($request->search) {
                $appsettings->search($request);
            }
        }

        if (isset($request->term)) {
            if ($request->term) {
                $appsettings->where('key', 'regexp', str_replace(' ', '_', $request->term));
            }
        }

        if (isset($request->onlyTrashed)) {
            if ($request->onlyTrashed) {
                $appsettings->onlyTrashed();
            }
        }

        if (isset($request->group)) {
            if ($request->group) {
                $appsettings->group($request);
            }
        }

        return $appsettings->sort($request)->paginate($total);
    }

    /**
     * Find settings by group column
     *
     * @param  string $group
     * @return AppSetting
     */
    public function findByGroup(string $group, $total = 10, $paginated = false)
    {
        $AppSettings = AppSetting::query()->where('group', $group);

        if ($paginated) {
            return $AppSettings->paginate($total);
        }

        return $AppSettings->orderBy('key')->get();
    }

    /**
     * Get group column
     *
     * @param  int $total
     * @param  boolean $paginated
     * @return AppSetting
     */
    public function getGroupField($groups = [], int $total = 10, $paginated = false)
    {
        $AppSettings = AppSetting::query()->groupByGroup()->orderBy('group');

        if (count($groups) > 0) {
            $AppSettings->whereIn('group', $groups);
        }

        if ($paginated) {
            return $AppSettings->paginate($total);
        }

        return $AppSettings->get();
    }

}
