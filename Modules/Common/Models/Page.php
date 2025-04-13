<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Common\Services\Filterables\PageFilters;
use Modules\Common\Traits\Sortable;

class Page extends Model
{
    use PageFilters;

    /**
     * Define fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'is_active',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];
}
