<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\FrontController;

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

 require __DIR__ . '/auth.php';

Route::group([
    'as' => 'front.',
], function () {
    
        Route::get('/', [FrontController::class, 'index'])->name('index');
        Route::get('/tentang-kami', [FrontController::class, 'about'])->name('about');
        
        Route::get('/hubungi-kami', [FrontController::class, 'contact'])->name('contact');
        Route::get('/daftar', [FrontController::class, 'member'])->name('member');
        Route::get('/faq', [FrontController::class, 'faq'])->name('faq');
        Route::get('/kebijakan-privasi', [FrontController::class, 'privacyPolicy'])->name('privacy-policy');
        Route::get('/syarat-ketentuan', [FrontController::class, 'termsAndConditions'])->name('terms-conditions');
        Route::group([
            'prefix' => 'berita',
            'as' => 'post.',
        ], function () {
            Route::get('/', [FrontController::class, 'post'])->name('index');
            Route::get('/{post:slug_title}', [FrontController::class, 'showPost'])->name('show');
        });
        Route::group([
            'middleware' => ['auth:member']
        ], function () {
            Route::get('/profil', [FrontController::class, 'profile'])->name('profile');
        
    });
});
