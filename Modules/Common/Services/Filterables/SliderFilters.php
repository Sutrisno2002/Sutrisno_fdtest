<?php

namespace Modules\Common\Services\Filterables;

trait SliderFilters
{
    /**
     * Generate thumbnail url
     * based on desktop_media_path column
     *
     * @return string
     */
    public function getThumbnail()
    {
        return !$this->desktop_media_path ?
        (cache('thumbanil') ? url(cache('thumbanil')) : 'https://placehold.co/600x400?text=' . $this->name) :
        url($this->desktop_media_path);
    }

    /**
     * Generate active status (badge)
     * based on is_active column
     *
     * @return string
     */
    public function showBadge()
    {
        if ($this->is_active) {
            return '<div class="badge soft-primary">Aktif</div>';
        }

        return '<div class="badge soft-dark">Tidak Aktif</div>';
    }

    /**
     * Handle search query in the Slider Table
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
     * Handle query to get banner with is_active or not
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsShow($query, $request)
    {
        if (isset($request->is_show)) {
            if ($request->is_show == 'true') {
                return $query->where('is_active', 1);
            }

            if ($request->is_show == 'false') {
                return $query->where('is_active', 0);
            }
        }
    }
}
