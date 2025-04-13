<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;

class CommonDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            // ProvinceTableSeeder::class,
            // RegencyTableSeeder::class,
            // DistrictTableSeeder::class,
            // VillageTableSeeder::class,
            // AppSettingSeeder::class,
            // SeoTableSeeder::class,
            // ContentTableSeeder::class,
            // PageTableSeeder::class,
            // CategorySeeder::class,
            // NavigationTableSeeder::class,
        ]);

        if (env('APP_ENV') == 'local') {
            $this->call([
                // FaqTableSeeder::class,
                PostTableSeeder::class,
            ]);
        }
    }
}
