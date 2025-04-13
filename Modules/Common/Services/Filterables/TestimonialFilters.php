<?php

namespace Modules\Common\Services\Filterables;

trait TestimonialFilters
{
    /**
     * Generate active status (badge)
     * based on is_active column
     *
     * @return string
     */
    public function showBadge()
    {
        if ($this->show_in_homepage) {
            return '<div class="badge soft-primary">Aktif</div>';
        }

        return '<div class="badge soft-dark">Tidak Aktif</div>';
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
            return $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('message', 'like', '%' . $request->search . '%');
        }

        return $query;
    }
}
