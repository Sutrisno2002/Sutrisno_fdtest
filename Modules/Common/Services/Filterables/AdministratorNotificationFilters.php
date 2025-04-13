<?php

namespace Modules\Common\Services\Filterables;

trait AdministratorNotificationFilters
{
    /**
     * Handle seen is seen notification
     *
     * @return boolean
     */
    public function isSeen()
    {
        return $this->seen_at ? true : false;
    }

    /**
     * Handle seen query in the customer notification table
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSeen($query, $request)
    {
        if (isset($request->seen)) {
            if (filter_var($request->seen, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === true) {
                return $query->whereNotNull('seen_at');
            } elseif (filter_var($request->seen, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === false) {
                return $query->whereNull('seen_at');
            } else {
                return $query;
            }
        }

        if (isset($request->tab)) {
            if (filter_var($request->tab, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === true) {
                return $query->whereNotNull('seen_at');
            } elseif (filter_var($request->tab, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === false) {
                return $query->whereNull('seen_at');
            } else {
                return $query;
            }
        }

        return $query;
    }

    /**
     * Handle search query in the customer notification table
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('short_description', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        return $query;
    }
}
