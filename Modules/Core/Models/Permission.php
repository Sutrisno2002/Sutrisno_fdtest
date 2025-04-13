<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Services\Filterables\PermissionFilters;

class Permission extends Model
{
    use HasFactory, PermissionFilters;

    /**
     * Define fillable columns.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'guard_name',
        'created_at',
        'updated_at',
    ];
}
