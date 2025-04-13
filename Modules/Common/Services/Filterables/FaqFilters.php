<?php

namespace Modules\Common\Services\Filterables;

trait FaqFilters
{
    /**
     * Generate featured faq (badge)
     * based on status featured
     *
     * @return string
     */
    public function featuredBadge()
    {
        // Faq is featured
        if ($this->is_featured) {
            return '<div class="badge soft-primary">
                Unggulan
            </div>';
        }

        // Not active
        return '<div class="badge soft-dark">Bukan</div>';
    }

    /**
     * Generate active status (badge)
     * based on status column
     *
     * @return string
     */
    public function statusBadge()
    {
        // Faq is active
        if ($this->is_active) {
            return '<div class="badge soft-primary">
                Aktif
            </div>';
        }

        // Not active
        return '<div class="badge soft-dark">Non Aktif</div>';
    }

    /**
     * Handle query to get active faq
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Handle search query in the faq Table
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  object $request
     * @return void
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('question', 'like', '%' . $request->search . '%')
                ->orWhere('answer', 'like', '%' . $request->search . '%');
        }

        return $query;
    }
}
