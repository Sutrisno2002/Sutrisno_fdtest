<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Contracts\Cacheable;
use Modules\Common\Models\AppSetting;

class AppSettingSeeder extends Seeder
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
            self::website(),
            self::contact(),
            self::social(),
            // self::front(),
        );

        // Cache::flush();
        foreach ($settings as $setting) {
            $this->updateCache($setting['key'], $setting['value']);
        }

        AppSetting::insert($settings);
    }

    /**
     * Handle default app settings -> website
     * @return array
     */
    public static function website(): array
    {
        return [
            [
                'group' => 'website_general',
                'name' => 'Nama Website',
                'key' => 'app_name',
                'value' => 'SOC Softwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Copyright',
                'key' => 'copyright',
                'value' => 'Copyright © SOC Softwarehouse' . ' ' . date('Y') . '. All rights reserved.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Logo Kecil',
                'key' => 'small_logo',
                'value' => '/assets/default/images/logo.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Logo',
                'key' => 'logo',
                'value' => '/assets/default/images/logo.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Logo Dark',
                'key' => 'logo_dark',
                'value' => '/assets/default/images/logo-dark.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Logo Footer',
                'key' => 'footer_logo',
                'value' => '/assets/default/images/logo.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Logo Footer Dark',
                'key' => 'footer_logo_dark',
                'value' => '/assets/default/images/logo-dark.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Deskripsi Footer',
                'key' => 'footer_description',
                'value' => 'SOC Software House adalah perusahaan pengembang perangkat lunak yang menyediakan solusi teknologi inovatif untuk membantu transformasi digital.',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Favicon',
                'key' => 'favicon',
                'value' => '/assets/default/images/favicon.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Gambar Thumbnail (16:9)',
                'key' => 'thumbnail',
                'value' => '/assets/default/images/thumbnail_16_9.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Gambar Thumbnail (1:1)',
                'key' => 'thumbnail_square',
                'value' => '/assets/default/images/thumbnail_square.png',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Gambar 404 (Not Found)',
                'key' => 'not_found_image',
                'value' => '/assets/default/images/data_not_found.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => '404 (Not Found)',
                'key' => 'image_not_found',
                'value' => '/assets/default/images/not_found.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Payment Success',
                'key' => 'image_payment_success',
                'value' => '/assets/default/images/payment_success.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Payment Error',
                'key' => 'image_payment_error',
                'value' => '/assets/default/images/payment_error.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Empty Cart',
                'key' => 'image_empty_cart',
                'value' => '/assets/default/images/empty_cart.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'website_general',
                'name' => 'Need Authentication',
                'key' => 'image_authentication',
                'value' => '/assets/default/images/authentication.svg',
                'type' => 'image',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Handle default app settings -> contact
     * @return array
     */
    public static function contact(): array
    {
        return [
            [
                'group' => 'contact',
                'name' => 'Alamat',
                'key' => 'contact_address',
                'value' => 'Surakarta, Jawa Tengah',
                'type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'name' => 'Telepon',
                'key' => 'contact_phone',
                'value' => null,
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'name' => 'WhatsApp',
                'key' => 'contact_whatsapp',
                'value' => null,
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'name' => 'Email',
                'key' => 'contact_email',
                'value' => 'official@socsoftwarehouse.com',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            // [
            //     'group' => 'contact',
            //     'name' => 'Email - Support',
            //     'key' => 'contact_support_email',
            //     'value' => 'support@socsoftwarehouse.com',
            //     'type' => 'input',
            //     'created_at' => now()->toDateTimeString(),
            //     'updated_at' => now()->toDateTimeString(),
            // ],
            [
                'group' => 'contact',
                'name' => 'embed_maps',
                'key' => 'contact_embed_maps',
                'value' => null,
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'name' => 'maps_link',
                'key' => 'contact_maps_link',
                'value' => null,
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Handle default app settings -> social
     * @return array
     */
    public static function social(): array
    {
        return [
            [
                'group' => 'social',
                'name' => 'Nama Instagram',
                'key' => 'social_instagram_name',
                'value' => '@socsoftwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Nama Facebook',
                'key' => 'social_facebook_name',
                'value' => 'SOC Softwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Nama TikTok',
                'key' => 'social_tiktok_name',
                'value' => '@socsoftwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Nama Twitter',
                'key' => 'social_twitter_name',
                'value' => '@socsoftwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Nama YouTube',
                'key' => 'social_youtube_name',
                'value' => 'SOC Softwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Alamat WhatsApp',
                'key' => 'social_whatsapp_link',
                'value' => null,
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Alamat Instagram',
                'key' => 'social_instagram_link',
                'value' => 'https://www.instagram.com/socsoftwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Alamat TikTok',
                'key' => 'social_tiktok_link',
                'value' => 'https://www.tiktok.com/@socsoftwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Alamat Twitter',
                'key' => 'social_twitter_link',
                'value' => 'https://x.com/socsoftwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Alamat Facebook',
                'key' => 'social_facebook_link',
                'value' => 'https://www.facebook.com/socsoftwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'social',
                'name' => 'Alamat Youtube',
                'key' => 'social_youtube_link',
                'value' => 'https://www.youtube.com/@socsoftwarehouse',
                'type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }
}
