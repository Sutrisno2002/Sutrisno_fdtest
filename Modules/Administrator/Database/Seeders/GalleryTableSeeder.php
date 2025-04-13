<?php

namespace Modules\Administrator\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Core\Models\User;
use Modules\Volunteers\Models\Gallery;
use Modules\Volunteers\Models\GalleryImages;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        $gallery = [
            [
                'title' => 'Galeri 1',
                'slug' => slug('Galeri 1'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur explicabo molestias quae quidem accusamus similique est consequatur excepturi voluptas culpa officia commodi, quia inventore distinctio cupiditate adipisci blanditiis maiores illo.',
            ],
            [
                'title' => 'Galeri 2',
                'slug' => slug('Galeri 2'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat maiores reprehenderit vitae, quis inventore soluta magnam ex pariatur sint nihil ab quae. Vitae praesentium distinctio quas reiciendis possimus.',
            ],
            [
                'title' => 'Galeri 3',
                'slug' => slug('Galeri 1'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur explicabo molestias quae quidem accusamus similique est consequatur excepturi voluptas culpa officia commodi, quia inventore distinctio cupiditate adipisci blanditiis maiores illo.',
            ],
            [
                'title' => 'Galeri 4',
                'slug' => slug('Galeri 2'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat maiores reprehenderit vitae, quis inventore soluta magnam ex pariatur sint nihil ab quae. Vitae praesentium distinctio quas reiciendis possimus.',
            ],
            [
                'title' => 'Galeri 5',
                'slug' => slug('Galeri 2'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat maiores reprehenderit vitae, quis inventore soluta magnam ex pariatur sint nihil ab quae. Vitae praesentium distinctio quas reiciendis possimus.',
            ],
            
        ];

        foreach ($gallery as $item) {
            $admin = User::where('name', 'admin')->get()->first();

            $id = Gallery::generateId();
            Gallery::create([
                'id' => $id,
                'title' => $item['title'],
                'slug' => $item['slug'],
                'date' => now(),
                'description' => $item['description'],
                'created_by' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            for ($i = 0; $i < 3; $i++) {
                $key = rand(1, 9999999); // Key unik untuk gambar

                GalleryImages::create([
                    'id' => GalleryImages::generateId(),
                    'gallery_id' => $id, // Menggunakan id galeri yang sama
                    'key' => $key,
                    'path' => 'assets/front/images/blog-0' . rand(1, 5) . '.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
