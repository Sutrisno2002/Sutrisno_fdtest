<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Common\Services\Filterables\NavigationFilters;
use Modules\Common\Traits\Sortable;

class Navigation extends Model
{
    use NavigationFilters;
    use Sortable;

    /**
     * Define fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
        'url',
        'icon',
        'active_state',
        'module',
        'placement',
        'sort_order',
        'is_active',
        'created_at',
        'updated_at',
    ];

    /**
     * Define child relation
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * Define parent relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }
}
