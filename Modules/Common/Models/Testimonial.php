<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Common\Services\Filterables\TestimonialFilters;
use Modules\Common\Traits\Sortable;

class Testimonial extends Model
{
    use TestimonialFilters;
    use HasFactory;
    use Sortable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'avatar',
        'message',
        'rating',
        'show_in_homepage',
        'created_at',
        'updated_at',
    ];
}
