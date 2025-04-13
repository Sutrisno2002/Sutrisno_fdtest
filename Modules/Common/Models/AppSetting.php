<?php

namespace Modules\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Common\Services\Filterables\AppSettingFilters;

class AppSetting extends Model
{
    use HasFactory, AppSettingFilters;

    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'app_settings';

    /**
     * Define fillable columns.
     *
     * @var string[]
     */
    protected $fillable = [
        'group',
        'key',
        'name',
        'value',
        'type',
        'created_at',
        'updated_at',
    ];
}
