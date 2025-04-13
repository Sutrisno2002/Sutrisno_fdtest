<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert($this->users());
        $users = User::all();

        // Add user role
        foreach ($users as $user) {
            $user->assignRole($user->name);
        }
    }

    /**
     * Generate user datas
     *
     * @return array
     */
    protected function users()
    {
        return [
            [
                'id' => User::generateId(),
                'name' => 'Developer',
                'name' => 'Developer',
                'avatar' => null,
                'email' => 'developer@app.com',
                'is_seen' => 0,
                'status' => 'active',
                'email_verified_at' => now()->toDateTimeString(),
                'password' => bcrypt('password'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'id' => User::generateId(),
                'name' => 'Super Admin',
                'avatar' => null,
                'email' => 'sa@app.com',
                'is_seen' => 0,
                'status' => 'active',
                'email_verified_at' => now()->toDateTimeString(),
                'password' => bcrypt('password'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'id' => User::generateId(),
                'name' => 'Admin',
                'avatar' => null,
                'email' => 'admin@app.com',
                'is_seen' => 0,
                'status' => 'active',
                'email_verified_at' => now()->toDateTimeString(),
                'password' => bcrypt('password'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }
}
