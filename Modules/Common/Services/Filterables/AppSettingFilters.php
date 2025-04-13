<?php

namespace Modules\Common\Services\Filterables;

trait AppSettingFilters
{
    /**
     * Handle search query in the AppSetting Table
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('group', 'like', '%' . $request->search . '%')
                ->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('key', 'like', '%' . $request->search . '%')
                ->orWhere('value', 'like', '%' . $request->search . '%')
                ->orWhere('type', 'like', '%' . $request->search . '%');
        }

        return $query;
    }

    /**
     * Handle query to sort in the AppSetting table
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

    /**
     * Handle query to get group by group field in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeGroupByGroup($query)
    {
        return $query->select('group')->groupBy('group');
    }

    /**
     * Handle query to find in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeGroup($query, $request)
    {
        $request = (object) $request;
        return $query->where('group', $request->group);
    }
}
