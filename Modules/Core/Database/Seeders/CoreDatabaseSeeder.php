<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CoreDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            RolePermissionSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
