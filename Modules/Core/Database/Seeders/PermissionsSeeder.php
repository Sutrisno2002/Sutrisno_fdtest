<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
    '* Run' the database seeds.,
     *
     * @return void
     */
    public function run()
    {

        foreach (array_keys($this->permissions()) as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
        }
    }

    /**
     * Generate permission datas
     *
     * @return array
     */
    public function permissions()
    {
        return [
            # Dashboard

            'read.dashboard' => ['Developer', 'Super Admin', 'Admin'],
            
            # Slider

            // 'read.slider' => ['Developer', 'Super Admin', 'Admin'],
            // 'create.slider' => ['Developer', 'Super Admin', 'Admin'],
            // 'update.slider' => ['Developer', 'Super Admin', 'Admin'],
            // 'delete.slider' => ['Developer', 'Super Admin', 'Admin'],
            // 'publish.slider' => ['Developer', 'Super Admin'],


             # Guest Message

             'read.guest_message' => ['Developer', 'Super Admin', 'Admin'],
             'create.guest_message' => ['Developer', 'Super Admin', 'Admin'],
             'update.guest_message' => ['Developer', 'Super Admin', 'Admin'],
             'delete.guest_message' => ['Developer', 'Super Admin'],

            # Member

            'read.member' => ['Developer', 'Super Admin', 'Admin'],
            'create.member' => ['Developer', 'Super Admin', 'Admin'],
            'show.member' => ['Developer', 'Super Admin', 'Admin'],
            'update.member' => ['Developer', 'Super Admin', 'Admin'],
            'delete.member' => ['Developer', 'Super Admin', 'Admin'],
            'publish.member' => ['Developer', 'Super Admin', 'Admin'],
            'blast.member' => ['Developer', 'Super Admin', 'Admin'],
            'import.member' => ['Developer', 'Super Admin', 'Admin'],
            'template.member' => ['Developer', 'Super Admin', 'Admin'],

            # Galeri

            'read.gallery' => ['Developer', 'Super Admin', 'Admin'],
            'create.gallery' => ['Developer', 'Super Admin', 'Admin'],
            'show.gallery' => ['Developer', 'Super Admin', 'Admin'],
            'update.gallery' => ['Developer', 'Super Admin', 'Admin'],
            'delete.gallery' => ['Developer', 'Super Admin', 'Admin'],
            'publish.gallery' => ['Developer', 'Super Admin', 'Admin'],

            # Article

            ## Listing

            'read.article' => ['Developer', 'Super Admin', 'Admin'],
            'create.article' => ['Developer', 'Super Admin', 'Admin'],
            'show.article' => ['Developer', 'Super Admin', 'Admin'],
            'update.article' => ['Developer', 'Super Admin', 'Admin'],
            'delete.article' => ['Developer', 'Super Admin', 'Admin'],
            'publish.article' => ['Developer', 'Super Admin', 'Admin'],

            ## Category

            'read.article-category' => ['Developer', 'Super Admin', 'Admin'],
            'create.article-category' => ['Developer', 'Super Admin', 'Admin'],
            'update.article-category' => ['Developer', 'Super Admin', 'Admin'],
            'delete.article-category' => ['Developer', 'Super Admin', 'Admin'],
            'publish.article-category' => ['Developer', 'Super Admin', 'Admin'],

            # FAQ

            ## Listing

            'read.faq' => ['Developer', 'Super Admin', 'Admin'],
            'create.faq' => ['Developer', 'Super Admin', 'Admin'],
            'update.faq' => ['Developer', 'Super Admin', 'Admin'],
            'delete.faq' => ['Developer', 'Super Admin', 'Admin'],
            'publish.faq' => ['Developer', 'Super Admin', 'Admin'],

            ## Category

            'read.faq-category' => ['Developer', 'Super Admin', 'Admin'],
            'create.faq-category' => ['Developer', 'Super Admin', 'Admin'],
            'update.faq-category' => ['Developer', 'Super Admin', 'Admin'],
            'delete.faq-category' => ['Developer', 'Super Admin', 'Admin'],
            'publish.faq-category' => ['Developer', 'Super Admin', 'Admin'],

            # Page

            'read.page' => ['Developer', 'Super Admin', 'Admin'],
            'create.page' => ['Developer', 'Super Admin', 'Admin'],
            'update.page' => ['Developer', 'Super Admin', 'Admin'],
            'delete.page' => ['Developer', 'Super Admin', 'Admin'],
            'publish.page' => ['Developer', 'Super Admin', 'Admin'],

            # Setting

            ## Main

            'read.setting-main' => ['Developer', 'Super Admin', 'Admin'],
            'create.setting-main' => ['Developer', 'Super Admin', 'Admin'],
            'update.setting-main' => ['Developer', 'Super Admin', 'Admin'],
            'delete.setting-main' => ['Developer', 'Super Admin', 'Admin'],

            ## Content

            'read.setting-content' => ['Developer', 'Super Admin', 'Admin'],
            'create.setting-content' => ['Developer', 'Super Admin', 'Admin'],
            'update.setting-content' => ['Developer', 'Super Admin', 'Admin'],
            'delete.setting-content' => ['Developer', 'Super Admin', 'Admin'],

            ## SEO

            'read.setting-seo' => ['Developer', 'Super Admin', 'Admin'],
            'create.setting-seo' => ['Developer', 'Super Admin', 'Admin'],
            'update.setting-seo' => ['Developer', 'Super Admin', 'Admin'],
            'delete.setting-seo' => ['Developer', 'Super Admin', 'Admin'],

            ## Navigation

            'read.setting-navigation' => ['Developer', 'Super Admin', 'Admin'],
            'create.setting-navigation' => ['Developer', 'Super Admin', 'Admin'],
            'update.setting-navigation' => ['Developer', 'Super Admin', 'Admin'],
            'delete.setting-navigation' => ['Developer', 'Super Admin', 'Admin'],

            # User

            'read.user' => ['Developer', 'Super Admin', 'Admin'],
            'create.user' => ['Developer', 'Super Admin', 'Admin'],
            'update.user' => ['Developer', 'Super Admin', 'Admin'],
            'delete.user' => ['Developer', 'Super Admin', 'Admin'],
            'export.user' => ['Developer', 'Super Admin', 'Admin'],
            'extra.user' => ['Developer', 'Super Admin', 'Admin'],

            # Role

            'read.role' => ['Developer', 'Super Admin'],
            'create.role' => ['Developer', 'Super Admin'],
            'update.role' => ['Developer', 'Super Admin'],
            'delete.role' => ['Developer', 'Super Admin'],
            'extra.role' => ['Developer', 'Super Admin'],

            # Permission

            'read.permission' => ['Developer', 'Super Admin'],
            'create.permission' => ['Developer', 'Super Admin'],
            'update.permission' => ['Developer', 'Super Admin'],
            'delete.permission' => ['Developer', 'Super Admin'],

            # Log

            'read.log' => ['Developer'],
            'create.log' => ['Developer'],
            'delete.log' => ['Developer'],
            'extra.log' => ['Developer'],

            # Monitoring

            'read.monitoring' => ['Developer'],
            'create.monitoring' => ['Developer'],
            'delete.monitoring' => ['Developer'],
            'extra.monitoring' => ['Developer'],
        ];
    }
}
