<?php

namespace Modules\Common\Services\Filterables;

trait ContentFilters
{
    /**
     * Handle search query in the Content Table
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('slug_group', 'like', '%' . $request->search . '%')
                ->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('key', 'like', '%' . $request->search . '%')
                ->orWhere('value', 'like', '%' . $request->search . '%')
                ->orWhere('type', 'like', '%' . $request->search . '%');
        }

        return $query;
    }

    /**
     * Handle query to get group by group field in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeGroupByGroup($query)
    {
        return $query->select('slug_group')->groupBy('slug_group');
    }

    /**
     * Handle query to find in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeGroup($query, $request)
    {
        if (isset($request->slug_group)) {
            return $query->where('slug_group', $request->slug_group);
        }
    }
}
