<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Common\Services\Filterables\AdministratorNotificationFilters;
use Modules\Common\Traits\BelongsToCategory;
use Modules\Common\Traits\Sortable;
use Modules\Core\Models\User;

class AdministratorNotification extends Model
{
    use BelongsToCategory;
    use AdministratorNotificationFilters;
    use Sortable;

    /**
     * Define fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'short_description',
        'description',
        'link',
        'seen_at',
        'seen_by',
        'created_at',
        'updated_at',
    ];

    /**
     * Define user relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seenBy()
    {
        return $this->belongsTo(User::class, 'seen_by', 'id');
    }
}
