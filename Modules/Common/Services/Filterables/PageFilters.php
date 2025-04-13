<?php

namespace Modules\Common\Services\Filterables;

trait PageFilters
{
    /**
     * Handle search query in the Page Table
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('short_description', 'like', '%' . $request->search . '%');
        }

        return $query;
    }

    /**
     * Handle query to sort in the User table
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
     * Generate verified status (badge)
     * based on status column
     *
     * @return string
     */
    public function activeBadge()
    {
        if ($this->is_active == true) {
            return '<div class="badge soft-primary">Aktif</div>';
        } elseif ($this->is_active == false) {
            return '<div class="badge soft-warning">Tidak Aktif</div>';
        }
    }
}
