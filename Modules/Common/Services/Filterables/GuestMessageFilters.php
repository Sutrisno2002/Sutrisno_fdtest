<?php

namespace Modules\Common\Services\Filterables;

trait GuestMessageFilters
{
    /**
     * Generate active status (badge)
     * based on is_active column
     *
     * @return string
     */
    public function showBadge()
    {
        if (isset($this->seen_at)&&isset($this->seen_by)) {
            return '<div class="badge soft-primary">Dibaca</div>';
        }

        return '<div class="badge soft-dark">Belum dibaca</div>';
    }

    /**
     * Handle search query in the testimonial Table
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  object $request
     * @return void
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('name', 'like', '%' . $request->search . '%');
        }

        return $query;
    }
}
