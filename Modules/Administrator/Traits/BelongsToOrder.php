<?php

namespace Modules\Administrator\Traits;

use Modules\Administrator\Models\Order;

trait BelongsToOrder
{
    /**
     * Define order relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * Filter model by order_id or slug
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrder($query, $request)
    {
        $query->when(isset($request->order), function ($query) use ($request) {
            $query->where('order_id', $request->order)
                ->orWhereHas('order', function ($relation) use ($request) {
                    $relation->where('order_code', $request->order);
                });
        });
    }
}
