<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\AppSettingController;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Core\Http\Controllers\MediaController;
use Modules\Core\Http\Controllers\PermissionController;
use Modules\Core\Http\Controllers\RoleController;
use Modules\Core\Http\Controllers\UserController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

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
    'prefix' => 'core',
    'as' => 'core.',
    'middleware' => 'role:Developer|Super Admin',
], function () {
    Route::group([
        'middleware' => ['auth:web'],
    ], function () {
        Route::get('/', [CoreController::class, 'index'])->name('index');

        // Logs
        Route::get('logs', [LogViewerController::class, 'index'])->name('logs');

        // User Management
        Route::group([
            'prefix' => 'user',
            'as' => 'user.',
        ], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        });

        // Role
        Route::group([
            'prefix' => 'role',
            'as' => 'role.',
        ], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        });

        // Permissions
        Route::group([
            'prefix' => 'permission',
            'as' => 'permission.',
        ], function () {
            Route::get('/', [PermissionController::class, 'index'])->name('index');
            Route::get('/create', [PermissionController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('edit');
        });

        // AppSettings
        Route::group([
            'prefix' => 'setting',
            'as' => 'app-setting.',
        ], function () {
            Route::get('/', [AppSettingController::class, 'index'])->name('index');
            Route::get('/create', [AppSettingController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [AppSettingController::class, 'edit'])->name('edit');
        });
    });
});

Route::group([
    'as' => 'media.',
    'prefix' => 'media',
], function () {
    Route::post('/upload-image', [MediaController::class, 'uploadImage'])->name('uploadImage');
    Route::post('/remove-image', [MediaController::class, 'destroyImage'])->name('destroyImage');
});

Route::get('resize', [MediaController::class, 'resize'])->name('resize');
