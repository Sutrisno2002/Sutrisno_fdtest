<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Common\Services\Filterables\GuestMessageFilters;
use Modules\Common\Traits\BelongsToUser;
use Modules\Common\Traits\Sortable;

class GuestMessage extends Model
{
    use HasFactory;
    use GuestMessageFilters;
    use BelongsToUser;
    use Sortable;

    /**
     * Define fillable column in the post table
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'whatsapp_code',
        'whatsapp_number',
        'subject',
        'message',
        'reply',
        'seen_at',
        'seen_by',
        'created_at',
        'updated_at',
    ];
}
