<?php

namespace Modules\Core\Services\Repositories;

use Modules\Core\Models\Permission;

class PermissionRepo
{
    /**
     * Separate permissions by group name
     *
     * @return array
     */
    public function separateByGroups($permissions = null, $guard_name = 'web')
    {
        if (!$permissions) {
            $permissions = Permission::where('guard_name', $guard_name)->get(['id', 'name']);
        }

        $groups = [];
        $permissionsGroups = [];

        foreach ($permissions as $permission) {
            $group = explode('.', $permission->name);
            if (!in_array($group[1], $permissionsGroups)) {
                $permissionsGroups[$group[1]][$group[0]] = true;
                $groups[$group[1]] = true;
            }
        }

        return [
            'groups' => $groups,
            'permissionsGroups' => $permissionsGroups,
        ];
    }

    /**
     * Get all permissions data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $permissions = Permission::query();

        if (isset($request->search)) {
            if ($request->search) {
                $permissions->search($request);
            }
        }

        if (isset($request->onlyTrashed)) {
            if ($request->onlyTrashed) {
                $permissions->onlyTrashed();
            }
        }

        return $permissions->sort($request)->paginate($total);
    }
}