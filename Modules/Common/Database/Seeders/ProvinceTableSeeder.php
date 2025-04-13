<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Modules\Common\Models\Province;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     $json = File::get(base_path('Modules/Common/Database/Seeders/json/province.json'));
    //     $provinces = json_decode($json, true);

    //     return Province::insert($provinces);
    // }
    public function run()
    {
        // Cek apakah file JSON ada
        $filePath = base_path('Modules/Common/Database/Seeders/json/province.json');
        if (!File::exists($filePath)) {
            $this->command->error("File province.json tidak ditemukan di path: $filePath");
            return;
        }

        // Baca isi file JSON
        $json = File::get($filePath);
        $provinces = json_decode($json, true);

        if ($provinces === null) {
            $this->command->error("Gagal menguraikan isi file JSON.");
            return;
        }

        foreach ($provinces as $provinceData) {
            // Menggunakan firstOrCreate untuk menghindari duplikasi data
            Province::firstOrCreate(
                ['id' => $provinceData['id']], // Asumsikan ada field 'id' sebagai primary key
                $provinceData
            );
        }

        $this->command->info('Provinces berhasil dimasukkan ke dalam database.');
    }
}
