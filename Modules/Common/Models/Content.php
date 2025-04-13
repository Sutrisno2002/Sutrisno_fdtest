<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Common\Services\Filterables\ContentFilters;
use Modules\Common\Traits\Sortable;

class Content extends Model
{
    use ContentFilters;
    use Sortable;

    /**
     * Define fillable column
     *
     * @var array
     */
    protected $fillable = [
        'slug_group',
        'label',
        'key',
        'value',
        'type',
        'created_at',
        'updated_at',
    ];
}
