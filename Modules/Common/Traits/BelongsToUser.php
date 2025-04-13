<?php

namespace Modules\Common\Traits;

use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Models\User;

trait BelongsToUser
{
    // protected static function bootBelongsToUser()
    // {
    //     /**
    //      * If user has branch_id, Model will automatic filter based on branch_id
    //      */
    //     static::addGlobalScope('filterBranch', function (Builder $builder) {
    //         $builder->when(auth()->user(), function ($query) {
    //             $query->where('branch_id', Auth::user()->branch_id);
    //         });
    //     });
    // }

    /**
     * Define user relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Filter model by user_id or slug
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeUser($query, $request)
    {
        $query->when(isset($request->user), function ($query) use ($request) {
            $query->where('user_id', $request->user)
                ->orWhereHas('user', function ($relation) use ($request) {
                    $relation->where('slug', $request->user);
                });
        });
    }
}
