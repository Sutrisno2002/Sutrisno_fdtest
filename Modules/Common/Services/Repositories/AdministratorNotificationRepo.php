<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Models\AdministratorNotification;

class AdministratorNotificationRepo
{
    /**
     * Get all administrator notitifications data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $administrators = AdministratorNotification::query();

        if (isset($request->tab)) {
            self::switchTab($administrators, $request);
        }

        if (isset($request->category)) {
            if ($request->category) {
                $administrators->category($request);
            }
        }

        if (isset($request->search)) {
            if ($request->search) {
                $administrators->search($request);
            }
        }

        return $administrators->sort($request)->paginate($total);
    }


    /**
     * Switch tab to query from active tab
     *
     * @param  Query $query
     * @param  object $request
     * @return void
     */
    public function switchTab($query, $request)
    {
        switch ($request->tab) {
            case 'all':
                return $query;
                break;

            case 'unseen':
                $request->tab = false;
                return $query->seen($request);
                break;

            case 'seen':
                $request->tab = true;
                return $query->seen($request);
                break;

            default:
                return $query;
                break;
        }
    }
}
