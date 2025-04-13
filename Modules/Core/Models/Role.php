<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Core\Services\Filterables\RoleFilters;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory, RoleFilters;

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
