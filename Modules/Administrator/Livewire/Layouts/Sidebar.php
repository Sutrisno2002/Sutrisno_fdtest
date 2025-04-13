<?php

namespace Modules\Administrator\Livewire\Layouts;

use Livewire\Component;

class Sidebar extends Component
{
    /**
     * Define menu on the administrator sidebar
     * @return array
     */
    public function menu()
    {
        return [
            [
                'name' => 'Dashboard',
                'active' => activeRouteIs('administrator.index', 'active') == 'active' ? true : false,
                'active_child' => null,
                'link' => route('administrator.index'),
                'permissions' => ['read.dashboard'],
                'icon' => 'bx bx-home-alt',
                'is_separator' => false,
                'childs' => [],
            ],
            [
                'name' => 'Website',
                'active' => activeRouteIs(''),
                'link' => null,
                'permissions' => [
                 
                    'read.article',
                ],
                'icon' => '',
                'is_separator' => true,
                'childs' => [],
            ],
            // [
            //     'name' => 'Anggota',
            //     'active' => activeRouteIs('administrator.member.*', 'active') == 'active' ? true : false,
            //     'link' => route('administrator.member.index'),
            //     'permissions' => ['read.member'],
            //     'icon' => 'bx bx-group',
            //     'is_separator' => false,
            //     'childs' => [],
            // ],
            // [
            //     'name' => 'Pesan Publik',
            //     'active' => activeRouteIs('administrator.guestmessage.*', 'active') == 'active' ? true : false,
            //     'link' => route('administrator.guestmessage.index'),
            //     'permissions' => ['read.guest_message'],
            //     'icon' => 'bx bx-message-dots',
            //     'is_separator' => false,
            //     'childs' => [],
            // ],
            // [
            //     'name' => 'Galeri',
            //     'active' => activeRouteIs('administrator.gallery.*', 'active') == 'active' ? true : false,
            //     'link' => route('administrator.gallery.index'),
            //     'permissions' => ['read.gallery'],
            //     'icon' => 'bx bx-images',
            //     'is_separator' => false,
            //     'childs' => [],
            // ],
            // [
            //     'name' => 'Slider',
            //     'active' => activeRouteIs('administrator.slider.*', 'active') == 'active' ? true : false,
            //     'link' => route('administrator.slider.index'),
            //     'permissions' => ['read.slider'],
            //     'icon' => 'bx bx-slideshow',
            //     'is_separator' => false,
            //     'childs' => [],
            // ],
            [
                'name' => 'Buku',
                'active' => activeRouteIs(['administrator.post.article.*', 'administrator.post.category.*'], 'active') == 'active' ? true : false,
                'link' => 'javascript:void(0)',
                'permissions' => [
                    'create.article',
                    'read.article',
                    'read.article-category',
                ],
                'icon' => 'bx bx-news',
                'is_separator' => false,
                'childs' => [
                    [
                        'name' => 'Tambah Buku',
                        'active' => activeRouteIs('administrator.post.article.create', 'active') == 'active' ? true : false,
                        'link' => route('administrator.post.article.create'),
                        'permission' => 'create.article',
                    ],
                    [
                        'name' => 'Semua Buku',
                        'active' => activeRouteIs(['administrator.post.article.index', 'administrator.post.article.edit'], 'active') == 'active' ? true : false,
                        'link' => route('administrator.post.article.index'),
                        'permission' => 'read.article',
                    ],
                    // [
                    //     'name' => 'Kategori',
                    //     'active' => activeRouteIs('administrator.post.category.*', 'active') == 'active' ? true : false,
                    //     'link' => route('administrator.post.category.index'),
                    //     'permission' => 'create.article-category',
                    // ],
                ],
            ],
            // [
            //     'name' => 'FAQ',
            //     'active' => activeRouteIs([
            //         'administrator.faq.index',
            //         'administrator.faq.main.*',
            //         'administrator.faq.category.*',
            //     ]),
            //     'link' => 'javascript:void(0)',
            //     'permissions' => [
            //         'read.faq',
            //         'read.faq-category',
            //     ],
            //     'icon' => 'bx bx-question-mark',
            //     'is_separator' => false,
            //     'childs' => [
            //         [
            //             'name' => 'Daftar FAQ',
            //             'active' => activeRouteIs('administrator.faq.main.*', 'active') == 'active' ? true : false,
            //             'link' => route('administrator.faq.main.index'),
            //             'permission' => 'read.faq',
            //         ],
            //         [
            //             'name' => 'Kategori FAQ',
            //             'active' => activeRouteIs('administrator.faq.category.*', 'active') == 'active' ? true : false,
            //             'link' => route('administrator.faq.category.index'),
            //             'permission' => 'read.faq-category',
            //         ],
            //     ],
            // ],
            // [
            //     'name' => 'Halaman',
            //     'active' => activeRouteIs('administrator.page.index', 'active') == 'active' ? true : false,
            //     'link' => route('administrator.page.index'),
            //     'permissions' => ['read.page'],
            //     'icon' => 'bx bx-book-content',
            //     'is_separator' => false,
            //     'childs' => [],
            // ],
            // [
            //     'name' => 'Pengaturan',
            //     'active' => activeRouteIs([
            //         'administrator.setting.main.index',
            //         'administrator.content.index',
            //         'administrator.setting.seo.index',
            //         'administrator.setting.navigation.index',
            //         'administrator.setting.main.edit',
            //         'administrator.content.edit',
            //         'administrator.setting.seo.edit',
            //         'administrator.setting.navigation.edit',
            //     ], 'active') == 'active' ? true : false,
            //     'link' => 'javascript:void(0)',
            //     'permissions' => [
            //         'read.setting-main',
            //         'read.setting-content',
            //         'read.setting-seo',
            //         'read.setting-navigation',
            //     ],
            //     'icon' => 'bx bx-cog',
            //     'is_separator' => false,
            //     'childs' => [
            //         [
            //             'name' => 'Pengaturan Utama',
            //             'active' => activeRouteIs(['administrator.setting.main.index', 'administrator.setting.main.edit']),
            //             'link' => route('administrator.setting.main.index'),
            //             'permission' => 'read.setting-main',
            //         ],
            //         [
            //             'name' => 'Konten Website',
            //             'active' => activeRouteIs(['administrator.content.index', 'administrator.content.edit']),
            //             'link' => route('administrator.content.index'),
            //             'permission' => 'read.setting-content',
            //         ],
            //         [
            //             'name' => 'SEO',
            //             'active' => activeRouteIs(['administrator.setting.seo.index', 'administrator.setting.seo.edit']),
            //             'link' => route('administrator.setting.seo.index'),
            //             'permission' => 'read.setting-seo',
            //         ],
            //         [
            //             'name' => 'Navigasi',
            //             'active' => activeRouteIs(['administrator.setting.navigation.index', 'administrator.setting.navigation.edit']),
            //             'link' => route('administrator.setting.navigation.index'),
            //             'permission' => 'read.setting-navigation',
            //         ],
            //     ],
            // ],
            [
                'name' => 'Kontrol Akses',
                'active' => activeRouteIs(''),
                'link' => null,
                'permissions' => [
                    'read.user',
                    'read.role',
                    'read.permission',
                ],
                'icon' => '',
                'is_separator' => true,
                'childs' => [],
            ],
            [
                'name' => 'User',
                'active' => activeRouteIs('administrator.user.*'),
                'link' => route('administrator.user.index'),
                'permissions' => ['read.user'],
                'icon' => 'bx bx-user',
                'is_separator' => false,
                'childs' => [],
            ],
            [
                'name' => 'Role',
                'active' => activeRouteIs('administrator.role.*'),
                'link' => route('administrator.role.index'),
                'permissions' => ['read.role'],
                'icon' => 'bx bx-check-shield',
                'is_separator' => false,
                'childs' => [],
            ],
            [
                'name' => 'Permission',
                'active' => activeRouteIs('administrator.permission.*'),
                'link' => route('administrator.permission.index'),
                'permissions' => ['read.permission'],
                'icon' => 'bx bx-fingerprint',
                'is_separator' => false,
                'childs' => [],
            ],
        ];
    }

    public function render()
    {
        return view('administrator::livewire.layouts.sidebar', [
            'menu' => self::menu(),
        ]);
    }
}
