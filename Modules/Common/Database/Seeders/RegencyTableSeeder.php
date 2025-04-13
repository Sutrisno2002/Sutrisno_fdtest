<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Modules\Common\Models\Regency;

class RegencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     $json = File::get(base_path('Modules/Common/Database/Seeders/json/regency.json'));
    //     $regencies = json_decode($json, true);

    //     return Regency::insert($regencies);
    // }

    public function run()
    {
        $filePath = base_path('Modules/Common/Database/Seeders/json/regency.json');

        if (!File::exists($filePath)) {
            $this->command->error("File regency.json tidak ditemukan di path: $filePath");
            return;
        }

        $json = File::get($filePath);
        $regencies = json_decode($json, true);

        if ($regencies === null) {
            $this->command->error("Gagal menguraikan isi file JSON.");
            return;
        }

        foreach ($regencies as $regencyData) {
            // Gunakan updateOrCreate untuk menghindari duplikasi data
            Regency::updateOrCreate(
                ['id' => $regencyData['id']], // Misalkan 'id' adalah field unik
                $regencyData
            );
        }

        $this->command->info('Regencies berhasil dimasukkan ke dalam database.');
    }
}
