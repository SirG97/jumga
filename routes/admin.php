<?php

use App\Http\Controllers\RiderController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', 'HomeController@index')->name('home');

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Verify Email
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::get('/rider/add', [RiderController::class, 'showRiderForm']);
Route::post('/rider/banks', [RiderController::class, 'getBanksFromRiderCountry']);
Route::post('/rider/account/resolve', [RiderController::class, 'resolveAccountNumber']);
Route::post('/rider/create', [RiderController::class, 'createAccount'])->name('createRider');
Route::post('/riders', [RiderController::class, 'addItem']);
Route::post('/sales', [HomeController::class, 'updateQuantity']);
Route::post('/merchants', [HomeController::class, 'removeItem']);
Route::get('/approvals', [HomeController::class, 'getCartItems']);
