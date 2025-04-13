<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Modules\Common\Contracts\Cacheable;
use Modules\Common\Models\Navigation;

class NavigationTableSeeder extends Seeder
{
    use Cacheable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $json = File::get(base_path('Modules/Common/Database/Seeders/json/navigation.json'));
        $navigations = json_decode($json, true);

        Navigation::insert($navigations, [
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);

        $newNavigations = Navigation::all();
        $this->updateCache('navigations', $newNavigations);
    }
}
