<?php

use App\Http\Controllers\Merchant\ApprovalController;
use App\Http\Controllers\Merchant\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Merchant\HomeController;
use App\Http\Controllers\Merchant\Auth\LoginController;
use App\Http\Controllers\Merchant\Auth\RegisterController;
use App\Http\Controllers\Merchant\Auth\ConfirmPasswordController;
use App\Http\Controllers\Merchant\Auth\ForgotPasswordController;
use App\Http\Controllers\Merchant\Auth\ResetPasswordController;
use App\Http\Controllers\Merchant\Auth\VerificationController;


// Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Reset Password
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Confirm Password
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

// Verify Email
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


// Dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'getProfile'])->name('profile');
Route::get('/notifications', [HomeController::class, 'notifications'])->name('notifications');
Route::get('/changepassword', [HomeController::class, 'changePassword'])->name('changePassword');

Route::get('/inventory', [ProductController::class, 'inventory'])->name('home');
Route::get('/sales', [ProductController::class, 'sales'])->name('sales');
Route::get('/product/add', [ProductController::class, 'addProduct'])->name('addProduct');

Route::get('/approve', [ApprovalController::class, 'approve'])->name('approve');
Route::get('/approve/proceed', [ApprovalController::class, 'proceedToApprovalPayment'])->name('approval');
Route::get('/verify', [ApprovalController::class, 'verifyApprovalPayment'])->name('verifyApproval');

