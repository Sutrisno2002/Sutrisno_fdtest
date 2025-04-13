<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Modules\Common\Contracts\Cacheable;
use Modules\Common\Models\District;

class DistrictTableSeeder extends Seeder
{
    use Cacheable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     $json = File::get(base_path('Modules/Common/Database/Seeders/json/district.json'));
    //     $districts = json_decode($json, true);

    //     return District::insert($districts);
    // }

    public function run()
    {
        $json = File::get(base_path('Modules/Common/Database/Seeders/json/district.json'));
        $districts = json_decode($json, true);

        return District::insert($districts);
    }
}
