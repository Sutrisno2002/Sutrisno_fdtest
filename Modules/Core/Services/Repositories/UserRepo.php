<?php

namespace Modules\Core\Services\Repositories;

use Modules\Core\Models\User;

class UserRepo
{
    /**
     * Get all users data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $users = User::query();

        if (isset($request->except_role)) {
            if (count($request->except_role) > 0) {
                $users
                    ->doesntHave('roles')
                    ->orWhereHas('roles', function ($role) use ($request) {
                        $role->whereNotIn('name', $request->except_role);
                    });
            }
        }

        if (isset($request->verified)) {
            if ($request->verified === 'verified') {
                $users->whereNotNull('email_verified_at');
            } elseif ($request->verified === 'unverified') {
                $users->whereNull('email_verified_at');
            }
        }
        

        if (isset($request->search)) {
            if ($request->search) {
                $users->search($request);
            }
        }

        if (isset($request->onlyTrashed)) {
            if ($request->onlyTrashed) {
                $users->onlyTrashed();
            }
        }

        return $users->sort($request)->paginate($total);
    }
}
