<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Common\Services\Filterables\CategoryFilters;
use Modules\Common\Traits\Sortable;

class Category extends Model
{
    use CategoryFilters;
    use Sortable;

    /**
     * Define fillable columns.
     *
     * @var string
     */
    protected $fillable = [
        'gallery_id',
        'name',
        'slug',
        'description',
        'icon',
        'parent_id',
        'sort_order',
        'status',
        'is_featured',
        'group',
        'language_id',
        'created_by',
        'updated_by',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Define belongs to relation as childs
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    /**
     * Define has many relation as childs
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
