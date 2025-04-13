<?php

namespace Modules\Administrator\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Common\Models\Village;
use Modules\Core\Models\User;
use Modules\Volunteers\Models\Member;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $members = [];

        for ($i = 0; $i < 150; $i++) {
            $members[] = [
                'name' => 'GPJ ' . ($i + 1),
                'email' => 'gpj' . ($i + 1) . '@gibranpenerusjokowi.com',
                'gender' => rand(0, 1) ? 'Pria' : 'Wanita',
                'place_of_birth' => 'Surakarta',
                'date_of_birth' => date('Y-m-d', strtotime('-' . rand(20, 40) . ' years')),
                'phone' => '081' . str_pad(rand(100000000, 999999999), 9, '0', STR_PAD_LEFT),
                'address' => 'Jl. Melati No. ' . rand(1, 100),
                'province_id' => '33',
                'regency_id' => '3372',
                'district_id' => '337201',
                'village_id' => Village::where('district_id', 337201)->inRandomOrder()->first()->id,
                'identity_number' => '337201' . str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            ];
        }

        foreach ($members as $member) {
            // Generate member number
            $lastMemberSerial = Member::query()
                ->whereNotNull('member_serial')
                ->orderBy('member_serial', 'desc')
                ->first();

            $lastMemberSerial = $lastMemberSerial ? $lastMemberSerial->member_serial : null;

            $memberNumberData = Member::generateMemberNumber($lastMemberSerial, $member['regency_id']);

            $avatar = 'images/users/user-' . rand(1, 11) . '.jpg';

            $admin = User::where('name', 'admin')->get()->first();

            // Insert member
            DB::table('members')->insert([
                'id' => Member::generateId(),
                'member_number' => $memberNumberData['member_number'],
                'member_code' => $memberNumberData['member_code'],
                'member_serial' => $memberNumberData['member_serial'],
                'name' => $member['name'],
                'gender' => $member['gender'],
                'place_of_birth' => $member['place_of_birth'],
                'date_of_birth' => $member['date_of_birth'],
                'phone' => $member['phone'],
                'email' => $member['email'],
                'password' => bcrypt('password'),
                'address' => $member['address'],
                'province_id' => $member['province_id'],
                'regency_id' => $member['regency_id'],
                'district_id' => $member['district_id'],
                'village_id' => $member['village_id'],
                'identity_number' => $member['identity_number'],
                'status' => 'active',
                'verified_at' => now(),
                'verified_by' => $admin->id,
                'avatar' => $avatar,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
