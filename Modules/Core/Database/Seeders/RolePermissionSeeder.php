<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\PermissionsSeeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = (new PermissionsSeeder())->permissions();
        $roles = Role::all();
        $results = [];

        // Create new index in results array and set with empty array
        foreach ($roles->pluck('name') as $role) {
            $results[$role] = [];
        }

        // Push $results[$role] = [$permissions]
        foreach ($permissions as $permission => $roleList) {
            foreach ($roles->pluck('name') as $roleIndex => $role) {
                if (in_array($role, $roleList)) {
                    array_push($results[$role], $permission);
                }
            }
        }

        // Attach every roles with default permissions
        foreach ($results as $roleName => $permissions) {
            $role = $roles->where('name', $roleName)->first();
            $role->givePermissionTo($permissions);
        }
    }
}