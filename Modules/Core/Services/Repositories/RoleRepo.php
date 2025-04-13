<?php

namespace Modules\Core\Services\Repositories;

use Modules\Core\Models\Role;

class RoleRepo
{
    /**
     * Get all roles data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $roles = Role::query()->withCount('permissions');

        if (isset($request->search)) {
            if ($request->search) {
                $roles->search($request);
            }
        }

        if (isset($request->onlyTrashed)) {
            if ($request->onlyTrashed) {
                $roles->onlyTrashed();
            }
        }

        return $roles->sort($request)->paginate($total);
    }
}
