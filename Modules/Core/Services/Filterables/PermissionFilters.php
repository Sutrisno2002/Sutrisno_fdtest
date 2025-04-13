<?php

namespace Modules\Core\Services\Filterables;

trait PermissionFilters
{
    /**
     * Handle search query in the Permission Table
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('guard_name', 'like', '%' . $request->search . '%');
        }

        return $query;
    }

    /**
     * Handle query to sort in the Permission table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeSort($query, $request)
    {
        $columns = $query->getModel()->getFillable();

        // Check if column is exist in database table column
        // Handle errors column not found
        if (isset($request->sort) && isset($request->order)) {
            if (in_array($request->sort, $columns)) {
                // Check if order like asc or desc
                // Data will only show if column is available and order is available
                if ($request->order == 'asc' || $request->order == 'desc') {
                    $query->orderBy($request->sort, $request->order);
                }
            } else {
                // If column found, will return empty array
                return $query;
            }

        }

        return $query;
    }
}
