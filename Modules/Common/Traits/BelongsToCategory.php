<?php

namespace Modules\Common\Traits;

use Modules\Common\Models\Category;

trait BelongsToCategory
{
    /**
     * Define category relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Filter model by category_id or slug
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategory($query, $request)
    {
        $query->when(isset($request->category), function ($query) use ($request) {
            $query->where('category_id', $request->category)
                ->orWhereHas('category', function ($relation) use ($request) {
                    $relation->where('slug', $request->category);
                });
        });
    }
}
