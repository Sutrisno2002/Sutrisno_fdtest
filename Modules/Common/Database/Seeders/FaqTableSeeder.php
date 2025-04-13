<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Common\Models\Category;
use Modules\Common\Models\Faq;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Insert data FAQ baru
        Faq::insert($this->data());
    }

    /**
     * All faq data
     * @return array
     */
    public function data()
    {
        // Ambil kategori 'Umum' dan 'Layanan' dari tabel kategori
        $general = Category::where('group', 'faqs')->where('name', 'Umum')->first('id');
        $service = Category::where('group', 'faqs')->where('name', 'Layanan')->first('id');

        return [
            [
                'id' => Faq::generateId(),
                'category_id' => $general->id,
                'question' => 'Apa itu SOC Softwarehouse?',
                'slug' => slug('Apa itu SOC Softwarehouse?'),
                'answer' => 'SOC Softwarehouse adalah perusahaan pengembangan perangkat lunak yang berfokus pada pembuatan solusi digital berkualitas tinggi. Kami menyediakan layanan pengembangan aplikasi web, mobile, dan sistem terintegrasi untuk membantu bisnis bertransformasi secara digital.',
                'sort_order' => 1,
                'is_featured' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Faq::generateId(),
                'category_id' => $general->id,
                'question' => 'Dimana lokasi kantor SOC Softwarehouse?',
                'slug' => slug('Dimana lokasi kantor SOC Softwarehouse?'),
                'answer' => 'Kantor kami berlokasi strategis di pusat kota. Silakan kunjungi halaman Kontak untuk informasi alamat lengkap dan petunjuk arah ke kantor kami.',
                'sort_order' => 2,
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Faq::generateId(),
                'category_id' => $general->id,
                'question' => 'Bagaimana cara menghubungi tim support?',
                'slug' => slug('Bagaimana cara menghubungi tim support?'),
                'answer' => 'Anda dapat menghubungi tim support kami melalui email di support@socsoftwarehouse.com atau melalui formulir kontak yang tersedia di website kami. Tim kami akan merespons dalam waktu 1x24 jam kerja.',
                'sort_order' => 3,
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Faq::generateId(),
                'category_id' => $general->id,
                'question' => 'Apakah SOC Softwarehouse menerima magang?',
                'slug' => slug('Apakah SOC Softwarehouse menerima magang?'),
                'answer' => 'Ya, kami membuka kesempatan magang untuk mahasiswa IT dan jurusan terkait. Informasi lengkap tentang program magang dapat dilihat di halaman Karir website kami.',
                'sort_order' => 4,
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Faq::generateId(),
                'category_id' => $service->id,
                'question' => 'Apa saja layanan yang ditawarkan SOC Softwarehouse?',
                'slug' => slug('Apa saja layanan yang ditawarkan SOC Softwarehouse?'),
                'answer' => 'Kami menawarkan berbagai layanan termasuk pengembangan aplikasi web, mobile apps, sistem ERP, CRM, integrasi sistem, konsultasi IT, dan maintenance sistem.',
                'sort_order' => 1,
                'is_featured' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Faq::generateId(),
                'category_id' => $service->id,
                'question' => 'Berapa lama waktu pengembangan aplikasi?',
                'slug' => slug('Berapa lama waktu pengembangan aplikasi?'),
                'answer' => 'Waktu pengembangan bervariasi tergantung kompleksitas proyek. Rata-rata proyek dapat selesai dalam 3-6 bulan. Kami akan memberikan estimasi waktu yang lebih akurat setelah berdiskusi detail tentang kebutuhan Anda.',
                'sort_order' => 2,
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Faq::generateId(),
                'category_id' => $service->id,
                'question' => 'Bagaimana proses pengembangan aplikasi?',
                'slug' => slug('Bagaimana proses pengembangan aplikasi?'),
                'answer' => 'Proses pengembangan meliputi analisis kebutuhan, desain, pengembangan, testing, dan deployment. Kami menerapkan metodologi Agile untuk memastikan hasil yang optimal dan sesuai kebutuhan klien.',
                'sort_order' => 3,
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Faq::generateId(),
                'category_id' => $service->id,
                'question' => 'Apakah ada layanan maintenance setelah aplikasi selesai?',
                'slug' => slug('Apakah ada layanan maintenance setelah aplikasi selesai?'),
                'answer' => 'Ya, kami menyediakan layanan maintenance dan support untuk memastikan aplikasi Anda tetap berjalan optimal. Paket maintenance dapat disesuaikan dengan kebutuhan Anda.',
                'sort_order' => 4,
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Faq::generateId(),
                'category_id' => $service->id,
                'question' => 'Apakah bisa request fitur tambahan setelah aplikasi selesai?',
                'slug' => slug('Apakah bisa request fitur tambahan setelah aplikasi selesai?'),
                'answer' => 'Ya, kami menerima permintaan pengembangan fitur tambahan setelah aplikasi selesai. Tim kami akan menganalisis kebutuhan dan memberikan proposal pengembangan yang sesuai.',
                'sort_order' => 5,
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Faq::generateId(),
                'category_id' => $service->id,
                'question' => 'Bagaimana dengan keamanan data aplikasi?',
                'slug' => slug('Bagaimana dengan keamanan data aplikasi?'),
                'answer' => 'Kami menerapkan standar keamanan tinggi dalam setiap pengembangan. Semua data dilindungi dengan enkripsi, regular backup, dan mengikuti best practice keamanan aplikasi terkini.',
                'sort_order' => 6,
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
}
