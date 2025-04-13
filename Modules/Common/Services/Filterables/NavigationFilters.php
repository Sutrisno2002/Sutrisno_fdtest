<?php

namespace Modules\Common\Services\Filterables;

trait NavigationFilters
{
    /**
     * Generate active status (badge)
     * based on status column
     *
     * @return string
     */
    public function statusBadge()
    {
        // Navigation is active
        if ($this->status) {
            return '<div class="badge badge-primary">
                Aktif
            </div>';
        }

        // Not active
        return '<div class="badge badge-secondary">Non Aktif</div>';
    }

    /**
     * Handle query to get last navigation position
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetParentLastPosition($query, $request)
    {
        if (isset($request->parent)) {
            return $query->whereNull('parent_id')
                ->orderBy('sort_order', 'desc');
        }
    }

    /**
     * Handle query to get child last navigation position
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetChildLastPosition($query, $request)
    {
        if (isset($request->parent)) {
            return $query->where('parent_id', $request->parent)
                ->orderBy('sort_order', 'desc');
        }
    }

    /**
     * Handle search query in the Navigation Table
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        return $query;
    }

    /**
     * Handle query to find navigation in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeNavigation($query, $request)
    {
        if (isset($request->navigation)) {
            return $query->where('parent_id', $request->navigation);
        }
    }
}
