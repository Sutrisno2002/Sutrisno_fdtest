<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Modules\Administrator\Database\Seeders\AdministratorDatabaseSeeder;
use Modules\Common\Database\Seeders\CommonDatabaseSeeder;
use Modules\Core\Database\Seeders\CoreDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cache::flush();
        (new Filesystem)->cleanDirectory('storage/app/public/images');
        (new Filesystem)->cleanDirectory('storage/app/public/videos');
        $this->call(CoreDatabaseSeeder::class);
        $this->call(CommonDatabaseSeeder::class);
        $this->call(AdministratorDatabaseSeeder::class);
    }
}
