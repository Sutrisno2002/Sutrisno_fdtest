<?php

use Illuminate\Support\Facades\Route;
use Modules\Administrator\Http\Controllers\AdministratorController;
use Modules\Administrator\Http\Controllers\AppSettingController;
use Modules\Administrator\Http\Controllers\CategoryController;
use Modules\Administrator\Http\Controllers\CmsController;
use Modules\Administrator\Http\Controllers\FaqCategoryController;
use Modules\Administrator\Http\Controllers\FaqController;
use Modules\Administrator\Http\Controllers\GalleryController;
use Modules\Administrator\Http\Controllers\MemberController;
use Modules\Administrator\Http\Controllers\NavigationController;
use Modules\Administrator\Http\Controllers\PageController;
use Modules\Administrator\Http\Controllers\PermissionController;
use Modules\Administrator\Http\Controllers\PostCategoryController;
use Modules\Administrator\Http\Controllers\PostController;
use Modules\Administrator\Http\Controllers\RoleController;
use Modules\Administrator\Http\Controllers\SeoController;
use Modules\Administrator\Http\Controllers\UserController;
use Modules\Administrator\Http\Controllers\GuestMessageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group([
    'prefix' => 'administrator',
    'as' => 'administrator.',
], function () {
    Route::group([
        'middleware' => ['auth:web', 'verified'],
    ], function () {
        Route::get('/', [AdministratorController::class, 'index'])->name('index');
        Route::get('/profile', [AdministratorController::class, 'profile'])->name('profile');

        // Content
        Route::group([
            'prefix' => 'konten',
            'as' => 'content.',
        ], function () {
            Route::get('/', [CmsController::class, 'index'])->name('index')->can('read.setting-content','web');
            Route::get('/tambah', [CmsController::class, 'create'])->name('create')->can('create.setting-content','web');
            Route::get('/edit/{id}', [CmsController::class, 'edit'])->name('edit')->can('update.setting-content','web');
        });

        // User
        Route::group([
            'prefix' => 'user',
            'as' => 'user.',
        ], function () {
            Route::get('/', [UserController::class, 'index'])->name('index')->can('read.user','web');
            Route::get('/tambah', [UserController::class, 'create'])->name('create')->can('create.user','web');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit')->can('update.user','web');
        });

        // Role
        Route::group([
            'prefix' => 'role',
            'as' => 'role.',
        ], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index')->can('read.role','web');
            Route::get('/tambah', [RoleController::class, 'create'])->name('create')->can('create.role','web');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit')->can('update.role','web');
        });

        // Permission
        Route::group([
            'prefix' => 'permission',
            'as' => 'permission.',
        ], function () {
            Route::get('/', [PermissionController::class, 'index'])->name('index')->can('read.permission','web');
            Route::get('/tambah', [PermissionController::class, 'create'])->name('create')->can('create.permission','web');
            Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('edit')->can('update.permission','web');
        });

        // Page
        Route::group([
            'prefix' => 'halaman',
            'as' => 'page.',
        ], function () {
            Route::get('/', [PageController::class, 'index'])->name('index')->can('read.page','web');
            Route::get('/tambah', [PageController::class, 'create'])->name('create')->can('create.page','web');
            Route::get('/edit/{id}', [PageController::class, 'edit'])->name('edit')->can('update.page','web');
        });

        ## APP Start

        // Member
        Route::group([
            'prefix' => 'anggota',
            'as' => 'member.',
        ], function () {
            Route::get('/', [MemberController::class, 'index'])->name('index')->can('read.member','web');
            Route::get('/tambah', [MemberController::class, 'create'])->name('create')->can('create.member','web');
            Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('edit')->can('update.member','web');
            Route::get('/detail/{id}', [MemberController::class, 'show'])->name('show')->can('show.member','web');
            Route::get('/blasting-kta', [MemberController::class, 'blast'])->name('blast')->can('blast.member','web');
            Route::get('/show-kta/{id}', [MemberController::class, 'previewKTA'])->name('previewKTA')->can('show.member','web');
            Route::get('/member/template', [MemberController::class, 'template'])->name('template')->can('template.member','web');
        });

        // Gallery
        Route::group([
            'prefix' => 'galeri',
            'as' => 'gallery.',
        ], function () {
            Route::get('/', [GalleryController::class, 'index'])->name('index')->can('read.gallery','web');
            Route::get('/tambah', [GalleryController::class, 'create'])->name('create')->can('create.gallery','web');
            Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit')->can('update.gallery','web');
            Route::get('/detail/{id}', [GalleryController::class, 'show'])->name('show')->can('show.gallery','web');
        });

        // Post
        Route::group([
            'prefix' => 'artikel',
            'as' => 'post.',
        ], function () {

            // Article
            Route::group([
                'as' => 'article.',
            ], function () {
                Route::get('/', [PostController::class, 'index'])->name('index')->can('read.article','web');
                Route::get('/tambah', [PostController::class, 'create'])->name('create')->can('create.article','web');
                Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit')->can('update.article','web');
            });

            // Post Category
            Route::group([
                'prefix' => 'kategori',
                'as' => 'category.',
            ], function () {
                Route::get('/', [PostCategoryController::class, 'index'])->name('index')->can('read.article-category','web');
                Route::get('/tambah', [PostCategoryController::class, 'create'])->name('create')->can('create.article-category','web');
                Route::get('/edit/{id}', [PostCategoryController::class, 'edit'])->name('edit')->can('update.article-category','web');
            });
        });

        // Settings Route
        Route::group([
            'prefix' => 'pengaturan',
            'as' => 'setting.',
        ], function () {

            // Navigation
            Route::group([
                'prefix' => 'utama',
                'as' => 'main.',
            ], function () {
                Route::get('/', [AppSettingController::class, 'index'])->name('index')->can('read.setting-main','web');
                Route::get('/tambah', [AppSettingController::class, 'create'])->name('create')->can('create.setting-main','web');
                Route::get('/edit/{id}', [AppSettingController::class, 'edit'])->name('edit')->can('update.setting-main','web');
            });

            // Navigation
            Route::group([
                'prefix' => 'navigasi',
                'as' => 'navigation.',
            ], function () {
                Route::get('/', [NavigationController::class, 'index'])->name('index')->can('read.setting-navigation','web');;
                Route::get('/tambah', [CategoryController::class, 'create'])->name('create')->can('create.setting-navigation','web');;
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit')->can('update.setting-navigation','web');;
            });

            // SEO
            Route::group([
                'prefix' => 'seo',
                'as' => 'seo.',
            ], function () {
                Route::get('/', [SeoController::class, 'index'])->name('index')->can('read.setting-seo','web');
                Route::get('/edit/{id}', [SeoController::class, 'edit'])->name('edit')->can('update.setting-seo','web');
            });
        });

        // Faq
        Route::group([
            'prefix' => 'faq',
            'as' => 'faq.',
        ], function () {
            // Faq
            Route::group([
                'as' => 'main.',
            ], function () {
                Route::get('/', [FaqController::class, 'index'])->name('index')->can('read.faq','web');
                Route::get('/tambah', [FaqController::class, 'create'])->name('create')->can('create.faq','web');
                Route::get('/edit/{id}', [FaqController::class, 'edit'])->name('edit')->can('update.faq','web');
            });

            // Faq Category
            Route::group([
                'prefix' => 'kategori',
                'as' => 'category.',
            ], function () {
                Route::get('/', [FaqCategoryController::class, 'index'])->name('index')->can('read.faq-category','web');
            });
        });

         // Guest Message
         Route::group([
            'prefix' => 'pesan-publik',
            'as' => 'guestmessage.',
        ], function () {
            Route::get('/', [GuestMessageController::class, 'index'])->name('index');
        });
    });
});
