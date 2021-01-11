<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [IndexController::class, 'index']);

Route::get('/products', [ProductController::class, 'all']);
Route::get('/product/{id}', [ProductController::class, 'get']);
//Route::get('/merchants', [MerchantController::class, 'all']);
//Route::get('/merchants/create', [MerchantController::class, 'create']);
//Route::post('/merchants/store', [MerchantController::class, 'store']);
//Route::get('/merchant/{id}', [MerchantController::class, 'get']);
//Route::get('/merchant/{id}/products', [MerchantController::class, '']);
Route::get('/categories', [CategoryController::class, 'all']);
Route::get('/category/{id}', [CategoryController::class, 'get']);

Auth::routes();

Route::get('/user/account', [HomeController::class, 'index'])->name('home');
Route::get('/user/orders', [HomeController::class, 'getOrders'])->name('orders');
Route::get('/user/items', [HomeController::class, 'getItems'])->name('savedTtems');
Route::get('/user/address', [HomeController::class, 'getAddress'])->name('address');
Route::get('/user/notifications', [HomeController::class, 'notifications'])->name('notifications');
Route::get('/user/changepassword', [HomeController::class, 'changePassword'])->name('changePassword');
