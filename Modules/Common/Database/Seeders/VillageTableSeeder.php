<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\Common\Contracts\Cacheable;
use Modules\Common\Models\Village;

class VillageTableSeeder extends Seeder
{
    use Cacheable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     $json = File::get(base_path('Modules/Common/Database/Seeders/json/village.json'));
    //     $villages = json_decode($json, true);

    //     $chunk = array_chunk($villages, 5000);

    //     if (config('app.env') == 'local') {
    //         foreach (array_slice($chunk, 0, 3) as $data) {
    //             Village::insert($data);
    //         }
    //     } else {
    //         foreach ($chunk as $data) {
    //             Village::insert($data);
    //         }
    //     }
    // }

    public function run()
    {
        $filePath = base_path('Modules/Common/Database/Seeders/json/village.json');

        if (!File::exists($filePath)) {
            $this->command->error("File village.json tidak ditemukan di path: $filePath");
            return;
        }

        $json = File::get($filePath);
        $villages = json_decode($json, true);

        if ($villages === null) {
            $this->command->error("Gagal menguraikan isi file JSON.");
            return;
        }

        $chunk = array_chunk($villages, 5000);

        DB::transaction(function () use ($chunk) {
            foreach ($chunk as $data) {
                foreach ($data as $villageData) {
                    // Remove 'created_at' and 'updated_at' if they don't exist in the table schema
                    unset($villageData['created_at']);
                    unset($villageData['updated_at']);

                    Village::updateOrCreate(
                        ['id' => $villageData['id']], // Assuming 'id' is the unique key
                        $villageData
                    );
                }
            }
        });

        $this->command->info('Villages berhasil dimasukkan ke dalam database.');
    }
}
