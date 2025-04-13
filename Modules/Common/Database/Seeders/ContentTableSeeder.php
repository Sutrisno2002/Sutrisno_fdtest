<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Contracts\Cacheable;
use Modules\Common\Models\Content;

class ContentTableSeeder extends Seeder
{
    use Cacheable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = array_merge(
            self::homepage(),
            self::faq(),
            self::aboutUs(),
            self::contactUs(),
            self::profile(),
            self::berita(),
            self::registration(),
        );

        // Cache::flush();
        foreach ($settings as $setting) {
            $this->updateCache($setting['key'], $setting['value']);
        }

        Content::insert($settings);
    }

    /**
     * Handle default content -> homepage
     * @return array
     */
    public static function homepage(): array
    {
        return [
            // Welcome Banner
            [
                'slug_group' => 'homepage',
                'label' => 'Banner - Heading',
                'key' => 'homepage.banner.title',
                'value' => 'SOC Software House',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Banner - Deskripsi', 
                'key' => 'homepage.banner.description',
                'value' => 'SOC Software House adalah perusahaan pengembang perangkat lunak yang menyediakan solusi teknologi 
                inovatif untuk membantu transformasi digital. Dengan semangat kolaborasi dan inovasi, kami berkomitmen 
                untuk menciptakan produk digital yang mendukung kemajuan bisnis, pendidikan, dan komunitas, demi mewujudkan 
                Indonesia Emas melalui perubahan positif dan keberlanjutan.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Banner - Tag',
                'key' => 'homepage.banner.tag', 
                'value' => '#SOCSoftwareHouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Banner - Gambar',
                'key' => 'homepage.banner.image',
                'value' => '/assets/default/images/logo.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            // Tambahan cache sesuai file_context_0
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Banner - Heading',
                'key' => 'homepage.title',
                'value' => 'SOC Software House',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Banner - Deskripsi',
                'key' => 'homepage.description',
                'value' => 'SOC Software House adalah perusahaan pengembang perangkat lunak yang menyediakan solusi teknologi 
                inovatif untuk membantu transformasi digital. Dengan semangat kolaborasi dan inovasi, kami berkomitmen 
                untuk menciptakan produk digital yang mendukung kemajuan bisnis, pendidikan, dan komunitas, demi mewujudkan 
                Indonesia Emas melalui perubahan positif dan keberlanjutan.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Item 1 - Ikon',
                'key' => 'homepage.item_1.icon',
                'value' => '/assets/front/agon/images/icons/icon-flower.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Item 1 - Judul',
                'key' => 'homepage.item_1.title',
                'value' => 'Judul Item 1',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Item 1 - Deskripsi',
                'key' => 'homepage.item_1.description',
                'value' => 'Deskripsi Item 1',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Item 2 - Ikon',
                'key' => 'homepage.item_2.icon',
                'value' => '/assets/front/agon/images/icons/icon-map.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Item 2 - Judul',
                'key' => 'homepage.item_2.title',
                'value' => 'Judul Item 2',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Item 2 - Deskripsi',
                'key' => 'homepage.item_2.description',
                'value' => 'Deskripsi Item 2',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Item 3 - Ikon',
                'key' => 'homepage.item_3.icon',
                'value' => '/assets/front/agon/images/icons/icon-pine.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Item 3 - Judul',
                'key' => 'homepage.item_3.title',
                'value' => 'Judul Item 3',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Cache - Item 3 - Deskripsi',
                'key' => 'homepage.item_3.description',
                'value' => 'Deskripsi Item 3',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            // About Features
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 1 - Ikon',
                'key' => 'homepage.about.feature_1.icon',
                'value' => '/assets/front/agon/images/icons/icon-leaf.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage', 
                'label' => 'Fitur 1 - Judul',
                'key' => 'homepage.about.feature_1.title',
                'value' => 'Optimasi Performa',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 1 - Deskripsi',
                'key' => 'homepage.about.feature_1.description',
                'value' => 'Solusi teknologi yang dioptimalkan untuk kinerja dan skalabilitas maksimal.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 2 - Ikon',
                'key' => 'homepage.about.feature_2.icon',
                'value' => '/assets/front/agon/images/icons/icon-leaf.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 2 - Judul',
                'key' => 'homepage.about.feature_2.title',
                'value' => 'Teknologi Modern',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 2 - Deskripsi',
                'key' => 'homepage.about.feature_2.description',
                'value' => 'Menggunakan teknologi terkini untuk memastikan sistem yang handal dan efisien.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 3 - Ikon',
                'key' => 'homepage.about.feature_3.icon',
                'value' => '/assets/front/agon/images/icons/icon-leaf.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 3 - Judul',
                'key' => 'homepage.about.feature_3.title',
                'value' => 'Integrasi Sistem',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 3 - Deskripsi',
                'key' => 'homepage.about.feature_3.description',
                'value' => 'Menghubungkan berbagai sistem untuk mengoptimalkan proses bisnis Anda.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 4 - Ikon',
                'key' => 'homepage.about.feature_4.icon',
                'value' => '/assets/front/agon/images/icons/icon-leaf.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 4 - Judul',
                'key' => 'homepage.about.feature_4.title',
                'value' => 'Dukungan Berkelanjutan',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Fitur 4 - Deskripsi',
                'key' => 'homepage.about.feature_4.description',
                'value' => 'Layanan dukungan teknis dan pemeliharaan sistem yang komprehensif.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan - Judul',
                'key' => 'homepage.services.title',
                'value' => 'Layanan Kami',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan - Deskripsi',
                'key' => 'homepage.services.description',
                'value' => 'Kami menghadirkan solusi teknologi inovatif untuk membantu bisnis Anda berkembang dengan pendekatan yang strategis, desain modern, dan teknologi canggih.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 1 - Ikon',
                'key' => 'homepage.services.service_1.icon',
                'value' => '/assets/front/agon/images/icons/app.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 1 - Judul',
                'key' => 'homepage.services.service_1.title',
                'value' => 'Pengembangan Aplikasi',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 1 - Deskripsi',
                'key' => 'homepage.services.service_1.description',
                'value' => 'Kami mengembangkan aplikasi yang dirancang khusus untuk memenuhi kebutuhan unik bisnis Anda.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 2 - Ikon',
                'key' => 'homepage.services.service_2.icon',
                'value' => '/assets/front/agon/images/icons/consultation.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 2 - Judul',
                'key' => 'homepage.services.service_2.title',
                'value' => 'Konsultasi Teknologi',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 2 - Deskripsi',
                'key' => 'homepage.services.service_2.description',
                'value' => 'Memberikan panduan strategis untuk memilih solusi teknologi terbaik bagi bisnis Anda.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 3 - Ikon',
                'key' => 'homepage.services.service_3.icon',
                'value' => '/assets/front/agon/images/icons/data-integration.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 3 - Judul',
                'key' => 'homepage.services.service_3.title',
                'value' => 'Integrasi Sistem',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 3 - Deskripsi',
                'key' => 'homepage.services.service_3.description',
                'value' => 'Menghubungkan berbagai sistem untuk meningkatkan efisiensi dan produktivitas bisnis Anda.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 4 - Ikon',
                'key' => 'homepage.services.service_4.icon',
                'value' => '/assets/front/agon/images/icons/world-wide-web.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 4 - Judul',
                'key' => 'homepage.services.service_4.title',
                'value' => 'Pengembangan Website',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 4 - Deskripsi',
                'key' => 'homepage.services.service_4.description',
                'value' => 'Kami merancang dan membangun website profesional untuk memperkuat kehadiran online Anda.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 5 - Ikon',
                'key' => 'homepage.services.service_5.icon',
                'value' => '/assets/front/agon/images/icons/settings.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 5 - Judul',
                'key' => 'homepage.services.service_5.title',
                'value' => 'Pemeliharaan IT',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 5 - Deskripsi',
                'key' => 'homepage.services.service_5.description',
                'value' => 'Layanan pemeliharaan dan dukungan IT untuk memastikan sistem Anda berjalan lancar.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 6 - Ikon',
                'key' => 'homepage.services.service_6.icon',
                'value' => '/assets/front/agon/images/icons/verified.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 6 - Judul',
                'key' => 'homepage.services.service_6.title',
                'value' => 'Keamanan Data',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Layanan 6 - Deskripsi',
                'key' => 'homepage.services.service_6.description',
                'value' => 'Solusi keamanan siber untuk melindungi data sensitif Anda dari ancaman online.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],


            

            // About

            [
                'slug_group' => 'homepage',
                'label' => 'Tentang Kami - Heading',
                'key' => 'homepage.about.Heading',
                'value' => 'SOC Software House',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Tentang Kami - Judul',
                'key' => 'homepage.about.title',
                'value' => 'SOC Software House',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Tentang Kami - Deskripsi',
                'key' => 'homepage.about.description',
                'value' => 'SOC Software House adalah sosok muda yang penuh inspirasi dan diharapkan dapat meneruskan kepemimpinan Presiden ke-7, Joko Widodo pada periode 2024-2029 sebagai Wakil Presiden Republik Indonesia. Gibran telah menunjukkan dedikasi dalam pelayanan publik dengan pendekatan yang inovatif dan merakyat. Kepemimpinannya diharapkan dapat melanjutkan visi Presiden ke-7, Joko Widodo dalam membawa Indonesia menuju kemajuan yang lebih baik, berkeadilan, dan sejahtera bagi seluruh rakyat.',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Tentang Kami - Gambar 1',
                'key' => 'homepage.about.image_1',
                'value' => '/assets/default/images/about/about-1.jpg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Tentang Kami - Gambar 2',
                'key' => 'homepage.about.image_2',
                'value' => '/assets/default/images/about/about-2.jpg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Tentang Kami - Gambar 3',
                'key' => 'homepage.about.image_3',
                'value' => '/assets/default/images/about/about-3.jpg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],

            // Berita Terbaru
            [
                'slug_group' => 'homepage',
                'label' => 'Berita Terbaru - Judul',
                'key' => 'homepage.news.title',
                'value' => 'Berita Terbaru',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Berita Terbaru - Deskripsi',
                'key' => 'homepage.news.description',
                'value' => 'Jelajahi berita dan artikel terbaru kami untuk mendapatkan update terkini seputar SOC Software House dan Relawan GPJ (SOC Software House)',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],

            // Youtube
            [
                'slug_group' => 'homepage',
                'label' => 'Youtube - Judul',
                'key' => 'homepage.youtube.title',
                'value' => 'Official Youtube Account',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Youtube - Deskripsi',
                'key' => 'homepage.youtube.description',
                'value' => 'SOC Software House',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Youtube - Link',
                'key' => 'homepage.youtube.link',
                'value' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/lIIppSwJmoM?si=l0cZOUNVwe8uS_d3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],

            // Media Center
            [
                'slug_group' => 'homepage',
                'label' => 'Media Center - Judul',
                'key' => 'homepage.media_center.title',
                'value' => 'SOC Software House',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'homepage',
                'label' => 'Media Center - Deskripsi',
                'key' => 'homepage.media_center.description',
                'value' => 'Akun Media Sosial Resmi SOC Software House',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],

        ];
    }

    /**
     * Handle default content -> faq
     * @return array
     */
    public static function faq(): array
    {
        return [
            [
                'slug_group' => 'faq',
                'label' => 'Halaman - Heading',
                'key' => 'faq.title',
                'value' => 'Butuh Bantuan? Cek FAQ Kami',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'faq',
                'label' => 'Halaman - Deskripsi',
                'key' => 'faq.description',
                'value' => 'Temukan jawaban atas pertanyaan umum seputar SOC Software House dan cara bergabung sebagai relawan. Cek FAQ kami untuk informasi lebih lanjut!',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Handle default content -> aboutUs
     * @return array
     */
    public static function aboutUs(): array
    {
        return [
            [
                'slug_group' => 'tentang_kami',
                'label' => 'Halaman - Heading',
                'key' => 'about_us.title',
                'value' => 'SOC Software House',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'tentang_kami',
                'label' => 'Halaman - Sub Heading',
                'key' => 'about_us.subtitle',
                'value' => 'SOC Software House',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'tentang_kami',
                'label' => 'Halaman - Deskripsi',
                'key' => 'about_us.description',
                'value' => "<p class='uo lb wm'>SOC Software House (GPJ) adalah sebuah perusahaan pengembang perangkat lunak yang berkomitmen untuk 
                                    mendukung transformasi digital di Indonesia. Dengan visi besar untuk mewujudkan Indonesia Emas, 
                                    SOC Software House berfokus pada inovasi teknologi yang mampu membawa perubahan positif dan 
                                    pembangunan berkelanjutan di berbagai sektor, termasuk sosial, ekonomi, dan lingkungan.
                                </p>
                                <p class='uo lb wm'>
                                    Dengan pengalaman panjang dalam menghadapi berbagai tantangan industri, SOC Software House menyadari 
                                    pentingnya kolaborasi dengan berbagai pemangku kepentingan untuk menciptakan solusi teknologi yang 
                                    inklusif dan berkeadilan. Kami percaya bahwa teknologi tidak hanya menjadi alat, tetapi juga katalis 
                                    dalam mempercepat kemajuan dan meningkatkan kualitas hidup masyarakat.
                                </p>
                                <p class='uo lb wm'>
                                    Selain menyediakan layanan pengembangan perangkat lunak, kami juga berkomitmen pada pengembangan talenta 
                                    lokal dan mendukung keberlanjutan melalui penerapan teknologi yang ramah lingkungan. SOC Software House 
                                    terus berinovasi untuk menciptakan produk digital yang mendukung pertumbuhan bisnis dan ekonomi 
                                    masyarakat secara berkeadilan.
                                </p>",
                'type' => 'editor',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            
            [
                'slug_group' => 'tentang_kami',
                'label' => 'Halaman - Deskripsi 2',
                'key' => 'about_us.description_2',
                'value' => null,
                'type' => 'editor',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Handle default content -> contact us
     * @return array
     */
    public static function contactUs(): array
    {
        return [
            [
                'slug_group' => 'hubungi_kami',
                'label' => 'Halaman - Heading',
                'key' => 'contact_us.title',
                'value' => 'Hubungi Kami',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'hubungi_kami',
                'label' => 'Halaman - Deskripsi',
                'key' => 'contact_us.description',
                'value' => 'Kami berkomitmen untuk memberikan pelayanan terbaik. Jika Anda memiliki pertanyaan, kebutuhan, atau ingin mendapatkan informasi lebih lanjut, silakan isi formulir di bawah ini.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'hubungi_kami',
                'label' => 'CTA - Gambar',
                'key' => 'contact_us.cta.image',
                'value' => '/assets/default/images/logo.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'hubungi_kami',
                'label' => 'CTA - Gambar Dark',
                'key' => 'contact_us.cta.image_dark',
                'value' => '/assets/default/images/logo-dark.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'hubungi_kami',
                'label' => 'CTA - Judul',
                'key' => 'contact_us.cta.title',
                'value' => 'Apakah Anda memiliki pertanyaan?',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'hubungi_kami',
                'label' => 'CTA - Deskripsi',
                'key' => 'contact_us.cta.description',
                'value' => 'Mohon untuk mengisi formulir berikut ini, dan kami akan segera menghubungi Anda untuk memberikan informasi lebih lanjut.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Handle default content -> contact us
     * @return array
     */
    public static function profile(): array
    {
        return [
            [
                'slug_group' => 'profile',
                'label' => 'Halaman - Heading',
                'key' => 'profile.title',
                'value' => 'Profil',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'profile',
                'label' => 'Halaman - Deskripsi',
                'key' => 'profile.description',
                'value' => 'Informasi mengenai profil Anda.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Handle default content -> berita
     * @return array
     */
    public static function berita(): array
    {
        return [
            [
                'slug_group' => 'berita',
                'label' => 'Halaman - Heading',
                'key' => 'berita.title',
                'value' => 'Berita',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'berita',
                'label' => 'Halaman - Deskripsi',
                'key' => 'berita.description',
                'value' => null,
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Handle default content -> registration
     * @return array
     */
    public static function registration(): array
    {
        return [
            [
                'slug_group' => 'registration',
                'label' => 'Halaman - Heading',
                'key' => 'registration.title',
                'value' => 'Daftar Relawan GPJ',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'slug_group' => 'registration',
                'label' => 'Halaman - Deskripsi',
                'key' => 'registration.description',
                'value' => 'Bergabunglah dengan kami SOC Software House . Isi formulir di bawah ini untuk menjadi bagian dari tim kami yang berdedikasi.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }
    /**
     * Handle default content -> ctaRegistration
     * @return array
     */
   
}
