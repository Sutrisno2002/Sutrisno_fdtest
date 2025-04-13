<?php

namespace Modules\Common\Services\Filterables;

trait CategoryFilters
{
    /**
     * Generate featured category (badge)
     * based on status featured
     *
     * @return string
     */
    public function featuredBadge()
    {
        // Category is featured
        if ($this->is_featured) {
            return '<div class="badge badge-primary">
                Unggulan
            </div>';
        }

        // Not active
        return '<div class="badge badge-secondary">Bukan</div>';
    }

    /**
     * Generate active status (badge)
     * based on status column
     *
     * @return string
     */
    public function statusBadge()
    {
        // Category is active
        if ($this->status) {
            return '<div class="badge badge-primary">
                Aktif
            </div>';
        }

        // Not active
        return '<div class="badge badge-secondary">Non Aktif</div>';
    }

    /**
     * Handle query to get active category
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Handle query to get not active category
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotActive($query)
    {
        return $query->where('status', false);
    }

    /**
     * Handle query to get featured category
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Handle query to get not featured category
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotFeatured($query)
    {
        return $query->where('is_featured', false);
    }

    /**
     * Handle query to get category by group
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeGroup($query, $request)
    {
        if (isset($request->group)) {
            return $query->with('childs')->where('group', $request->group);
        }
    }

    /**
     * Handle query to get last category position
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetParentLastPosition($query, $request)
    {
        if (isset($request->category)) {
            return $query->whereNull('parent_id');
        }
    }

    /**
     * Handle query to get child last category position
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetChildLastPosition($query, $request)
    {
        if (isset($request->parent)) {
            return $query->where('parent_id', $request->parent);
        }
    }

    /**
     * Handle search query in the Category Table
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
     * Handle query to find category in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategory($query, $request)
    {
        if (isset($request->category)) {
            return $query->where('parent_id', $request->category);
        }
    }

}
