<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Common\Contracts\UniqueIdGenerator;
use Modules\Common\Services\Filterables\FaqFilters;
use Modules\Common\Traits\BelongsToCategory;
use Modules\Common\Traits\Sortable;

class Faq extends Model
{
    use HasFactory;
    use FaqFilters;
    use BelongsToCategory;
    use UniqueIdGenerator;
    use Sortable;

    /**
     * Define for post factory
     *
     * @return Modules\Common\Database\factories\FaqFactory
     */
    protected static function newFactory()
    {
        return \Modules\Common\Database\factories\FaqFactory::new();
    }

    /**
     * Define id data type is a string
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Cast post id
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
    ];

    /**
     * Define with relation
     *
     * @var array
     */
    protected $with = [
        'category:id,slug',
    ];

    /**
     * Define fillable column in the post table
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'category_id',
        'question',
        'slug',
        'answer',
        'sort_order',
        'is_featured',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
