<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Modules\Common\Models\Page;
use Modules\Core\Models\User;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::insert(self::data());
    }

    /**
     * Generate seo datas
     * @return array
     */
    public function data()
    {
        $creator = User::first();
        return [
            [
                'title' => 'Kebijakan Privasi',
                'slug' => 'kebijakan-privasi',
                'short_description' => 'Halaman ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi data pribadi Anda sebagai relawan untuk memastikan privasi dan keamanan informasi Anda.',
                'description' => self::privacyPolicy(),
                'is_active' => 1,
                // 'created_by' => $creator->id,
                // 'updated_by' => $creator->id,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'title' => 'Syarat & Ketentuan',
                'slug' => 'syarat-ketentuan',
                'short_description' => 'Halaman ini mencakup ketentuan penggunaan website dan pendaftaran relawan, termasuk kewajiban untuk memberikan data diri yang valid.',
                'description' => self::termsAndConditions(),
                'is_active' => 1,
                // 'created_by' => $creator->id,
                // 'updated_by' => $creator->id,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Terms of conditions page
     * @return html
     */
    public function termsAndConditions()
    {
        return File::get(base_path('Modules/Common/Database/Seeders/markdown/terms-conditions.md'));
    }

    /**
     * Terms of conditions page
     * @return html
     */
    public function privacyPolicy()
    {
        return File::get(base_path('Modules/Common/Database/Seeders/markdown/privacy-policy.md'));
    }
}
