<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\Auth\AuthenticatedSessionController;
use Modules\Front\Http\Controllers\Auth\EmailVerificationNotificationController;
use Modules\Front\Http\Controllers\Auth\EmailVerificationPromptController;
use Modules\Front\Http\Controllers\Auth\NewPasswordController;
use Modules\Front\Http\Controllers\Auth\PasswordResetLinkController;
use Modules\Front\Http\Controllers\Auth\VerifyEmailController;

Route::group([
    'as' => 'front.',
    'middleware' => ['guest:member'],
], function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])->name('register.form');
    // Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

    // Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login.form');
    // Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    // Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');

    // Route::group([
    //     'middleware' => 'auth:member',
    // ], function () {
    //     Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    //     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    //     Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    //     Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    // });
});
