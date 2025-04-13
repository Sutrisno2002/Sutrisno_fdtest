<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Common\Services\Filterables\SliderFilters;
use Modules\Common\Traits\Sortable;

class Slider extends Model
{
    use SliderFilters;
    use Sortable;

    /**
     * Define fillable columns.
     *
     * @var string[]
     */
    protected $fillable = [
        'banner_type',
        'name',
        'description',
        'desktop_media_path',
        'mobile_media_path',
        'placement_route',
        'alt',
        'references_url',
        'position',
        'is_active',
        'desktop_background_position',
        'mobile_background_position',
        'with_caption',
        'caption_title',
        'caption_text',
        'with_button',
        'button_text',
        'button_link',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

}
