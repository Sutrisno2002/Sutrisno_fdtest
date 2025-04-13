<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert parents
        Category::insert($this->postCategories('parent'));
        // Category::insert($this->notificationCategories('parent'));
        Category::insert($this->faqCategories('parent'));

        // // Insert childs
        // Category::insert($this->postCategories('child'));
        // Category::insert($this->notificationCategories('child'));
    }

    /**
     * Generate post categories
     *
     * @param string $type
     * @return array
     */
    public function postCategories($type)
    {
        switch ($type) {
            case 'parent':
                return [
                    [
                        'name' => 'Politik',
                        'slug' => slug('Politik'),
                        'description' => 'Deskripsi Kategori Politik',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'posts',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Wapres',
                        'slug' => slug('Wapres'),
                        'description' => 'Deskripsi Kategori Wapres Gibran Rakabuming',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'posts',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Relawan',
                        'slug' => slug('Relawan'),
                        'description' => 'Deskripsi Kategori Relawan GPJ',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'posts',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Umum',
                        'slug' => slug('Umum'),
                        'description' => 'Deskripsi Kategori Umum',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'posts',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];
                break;

            case 'child':
                return [
                    // [
                    //     'name' => 'Branding',
                    //     'slug' => slug('Branding'),
                    //     'description' => 'Deskripsi Kategori Branding',
                    //     'parent_id' => Category::where('name', 'Digital Marketing')->pluck('id')[0],
                    //     'status' => true,
                    //     'is_featured' => false,
                    //     'group' => 'posts',
                    //     'created_at' => now(),
                    //     'updated_at' => now(),
                    // ],
                    // [
                    //     'name' => 'Hukum',
                    //     'slug' => slug('Hukum'),
                    //     'description' => 'Deskripsi Kategori Hukum',
                    //     'parent_id' => Category::where('name', 'Politik')->pluck('id')[0],
                    //     'status' => true,
                    //     'is_featured' => false,
                    //     'group' => 'posts',
                    //     'created_at' => now(),
                    //     'updated_at' => now(),
                    // ],
                ];
                break;
        }
    }

    /**
     * Generate faq categories
     *
     * @param string $type
     * @return array
     */
    public function faqCategories($type)
    {
        switch ($type) {
            case 'parent':
                return [
                    [
                        'name' => 'Umum',
                        'slug' => slug('Umum'),
                        'description' => 'Deskripsi Kategori Umum',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'faqs',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Pendaftaran',
                        'slug' => slug('Pendaftaran'),
                        'description' => 'Deskripsi Kategori Pendaftaran',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'faqs',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    // [
                    //     'name' => 'Kelas Online',
                    //     'slug' => slug('Kelas Online'),
                    //     'description' => 'Deskripsi Kategori Kelas Online',
                    //     'parent_id' => null,
                    //     'status' => true,
                    //     'is_featured' => false,
                    //     'group' => 'faqs',
                    //     'created_at' => now(),
                    //     'updated_at' => now(),
                    // ],
                    // [
                    //     'name' => 'Pembayaran',
                    //     'slug' => slug('Pembayaran'),
                    //     'description' => 'Deskripsi Kategori Pembayaran',
                    //     'parent_id' => null,
                    //     'status' => true,
                    //     'is_featured' => false,
                    //     'group' => 'faqs',
                    //     'created_at' => now(),
                    //     'updated_at' => now(),
                    // ],
                    // [
                    //     'name' => 'Kelas Live',
                    //     'slug' => slug('Kelas Live'),
                    //     'description' => 'Deskripsi Kategori Kelas Live',
                    //     'parent_id' => null,
                    //     'status' => true,
                    //     'is_featured' => false,
                    //     'group' => 'faqs',
                    //     'created_at' => now(),
                    //     'updated_at' => now(),
                    // ],
                ];
                break;
        }
    }

    /**
     * Generate notification categories
     *
     * @param string $type
     * @return array
     */
    public function notificationCategories($type)
    {
        switch ($type) {
            case 'parent':
                return [
                    [
                        'name' => 'Order',
                        'slug' => slug('Order'),
                        'description' => 'Deskripsi Kategori Order',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'User',
                        'slug' => slug('User'),
                        'description' => 'Deskripsi Kategori User',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Customer',
                        'slug' => slug('Customer'),
                        'description' => 'Deskripsi Kategori Customer',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Mentor',
                        'slug' => slug('Mentor'),
                        'description' => 'Deskripsi Kategori Mentor',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Course',
                        'slug' => slug('Course'),
                        'description' => 'Deskripsi Kategori Course',
                        'parent_id' => null,
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];
                break;

            case 'child':
                return [
                    [
                        'name' => 'Create Order',
                        'slug' => slug('Create Order'),
                        'description' => 'Deskripsi Kategori Create Order',
                        'parent_id' => Category::where('name', 'Order')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Document.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Order Complete',
                        'slug' => slug('Order Complete'),
                        'description' => 'Deskripsi Kategori Order Complete',
                        'parent_id' => Category::where('name', 'Order')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Document.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Payment Success',
                        'slug' => slug('Payment Success'),
                        'description' => 'Deskripsi Kategori Payment Success',
                        'parent_id' => Category::where('name', 'Order')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Rocket.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Payment error',
                        'slug' => slug('Payment error'),
                        'description' => 'Deskripsi Kategori Payment error',
                        'parent_id' => Category::where('name', 'Order')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Danger.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Payment Expired',
                        'slug' => slug('Payment Expired'),
                        'description' => 'Deskripsi Kategori Payment Expired',
                        'parent_id' => Category::where('name', 'Order')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Danger.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'New Customer',
                        'slug' => slug('New Customer'),
                        'description' => 'Deskripsi Kategori New Customer',
                        'parent_id' => Category::where('name', 'Customer')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Add user.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Coruse Review',
                        'slug' => slug('Coruse Review'),
                        'description' => 'Deskripsi Kategori Coruse Review',
                        'parent_id' => Category::where('name', 'Course')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Message square.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Course Lesson',
                        'slug' => slug('Course Lesson'),
                        'description' => 'Deskripsi Kategori Course Lesson',
                        'parent_id' => Category::where('name', 'Course')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Book.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Course Claimed',
                        'slug' => slug('Course Claimed'),
                        'description' => 'Deskripsi Kategori Course Claimed',
                        'parent_id' => Category::where('name', 'Course')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Book.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Courses Given',
                        'slug' => slug('Courses Given'),
                        'description' => 'Deskripsi Kategori Courses Given',
                        'parent_id' => Category::where('name', 'Course')->pluck('id')[0],
                        'status' => true,
                        'is_featured' => false,
                        'group' => 'notifications',
                        'icon' => '/assets/default/Iconex/Book.svg',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];
                break;
        }
    }
}
