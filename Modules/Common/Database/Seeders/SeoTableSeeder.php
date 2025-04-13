<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Contracts\Cacheable;
use Modules\Common\Models\AppSetting;

class SeoTableSeeder extends Seeder
{
    use Cacheable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::data() as $setting) {
            $this->updateCache($setting['key'], $setting['value']);
        }

        AppSetting::insert(self::data());
    }

    /**
     * Generate seo datas
     *
     * @return array
     */
    public function data()
    {
        return [
            /**
             * Common
             */
            // Beranda
            [
                'group' => 'seo',
                'name' => 'Judul',
                'key' => 'seo_judul_beranda',
                'value' => 'GPJ Official',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Deskripsi',
                'key' => 'seo_deskripsi_beranda',
                'value' => 'Gibran Penerus Jokowi (GPJ) adalah gerakan relawan yang mendukung Gibran Rakabuming Raka untuk melanjutkan perjuangan Presiden ke-7, Joko Widodo, dengan semangat mewujudkan Indonesia Emas melalui perubahan positif dan kemajuan berkelanjutan.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Gambar',
                'key' => 'seo_gambar_beranda',
                'value' => '/assets/default/images/thumbnail.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Keyword',
                'key' => 'seo_keyword_beranda',
                'value' => '',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            // Tentang Kami
            [
                'group' => 'seo',
                'name' => 'Judul',
                'key' => 'seo_judul_tentang_kami',
                'value' => 'Tentang GPJ',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Deskripsi',
                'key' => 'seo_deskripsi_tentang_kami',
                'value' => 'Gibran Penerus Jokowi (GPJ) adalah sebuah gerakan relawan yang mengusung semangat untuk mendukung Gibran Rakabuming Raka dalam melanjutkan perjuangan Presiden ke-7, Joko Widodo. Dengan visi besar untuk mewujudkan Indonesia Emas, gerakan ini bertekad membawa perubahan positif melalui upaya pembangunan berkelanjutan, dengan menekankan transformasi sosial, ekonomi, dan politik yang inklusif serta berkeadilan.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Gambar',
                'key' => 'seo_gambar_tentang_kami',
                'value' => '/assets/default/images/thumbnail.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Keyword',
                'key' => 'seo_keyword_tentang_kami',
                'value' => '',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            // Hubungi Kami
            [
                'group' => 'seo',
                'name' => 'Judul',
                'key' => 'seo_judul_hubungi_kami',
                'value' => 'Hubungi Kami',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Deskripsi',
                'key' => 'seo_deskripsi_hubungi_kami',
                'value' => 'Kami berkomitmen untuk memberikan pelayanan terbaik. Jika Anda memiliki pertanyaan, kebutuhan, atau ingin mendapatkan informasi lebih lanjut, silakan hubungi kami.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Gambar',
                'key' => 'seo_gambar_hubungi_kami',
                'value' => '/assets/default/images/thumbnail.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Keyword',
                'key' => 'seo_keyword_hubungi_kami',
                'value' => '',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            // Berita
            [
                'group' => 'seo',
                'name' => 'Judul',
                'key' => 'seo_judul_berita',
                'value' => 'Berita',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Deskripsi',
                'key' => 'seo_deskripsi_berita',
                'value' => 'Baca berita terkini seputar gerakan Gibran Penerus Jokowi (GPJ) dan perjuangan Gibran Rakabuming Raka dalam melanjutkan visi Presiden ke-7, Joko Widodo. Dapatkan informasi terbaru tentang perkembangan politik, sosial, dan ekonomi yang mendukung Indonesia Emas.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Gambar',
                'key' => 'seo_gambar_berita',
                'value' => '/assets/default/images/thumbnail.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Keyword',
                'key' => 'seo_keyword_berita',
                'value' => '',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            // Galeri
            [
                'group' => 'seo',
                'name' => 'Judul',
                'key' => 'seo_judul_galeri',
                'value' => 'Galeri',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Deskripsi',
                'key' => 'seo_deskripsi_galeri',
                'value' => 'Jelajahi koleksi foto dan video dalam Galeri Gibran Penerus Jokowi (GPJ) yang menampilkan momen-momen bersejarah dan kegiatan mendukung Gibran Rakabuming Raka. Temukan visual inspiratif yang memperlihatkan semangat perjuangan untuk Indonesia Emas.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Gambar',
                'key' => 'seo_gambar_galeri',
                'value' => '/assets/default/images/thumbnail.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Keyword',
                'key' => 'seo_keyword_galeri',
                'value' => '',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            // Daftar Relawan
            [
                'group' => 'seo',
                'name' => 'Judul',
                'key' => 'seo_judul_daftar_relawan',
                'value' => 'Daftar Relawan GPJ',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Deskripsi',
                'key' => 'seo_deskripsi_daftar_relawan',
                'value' => 'Bergabunglah dengan kami Relawan Gibran Penerus Jokowi (GPJ). Isi formulir di bawah ini untuk menjadi bagian dari tim kami yang berdedikasi.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Gambar',
                'key' => 'seo_gambar_daftar_relawan',
                'value' => '/assets/default/images/thumbnail.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Keyword',
                'key' => 'seo_keyword_daftar_relawan',
                'value' => '',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            // FAQ
            [
                'group' => 'seo',
                'name' => 'Judul',
                'key' => 'seo_judul_faq',
                'value' => 'FAQ',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Deskripsi',
                'key' => 'seo_deskripsi_faq',
                'value' => 'Temukan jawaban atas pertanyaan umum seputar Gibran Penerus Jokowi (GPJ) dan cara bergabung sebagai relawan.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Gambar',
                'key' => 'seo_gambar_faq',
                'value' => '/assets/default/images/thumbnail.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Keyword',
                'key' => 'seo_keyword_faq',
                'value' => '',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],

            /**
             * AUTH PAGES
             */
            // Register
            [
                'group' => 'seo',
                'name' => 'Judul',
                'key' => 'seo_judul_register',
                'value' => 'Pendaftaran Relawan',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Deskripsi',
                'key' => 'seo_deskripsi_register',
                'value' => 'Bergabunglah dengan kami Relawan Gibran Penerus Jokowi (GPJ).',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Gambar',
                'key' => 'seo_gambar_register',
                'value' => '/assets/default/images/thumbnail.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'name' => 'Keyword',
                'key' => 'seo_keyword_register',
                'value' => '',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }
}
