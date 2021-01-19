<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartController;
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

Route::get('/products', [IndexController::class, 'viewProductsPage']);
Route::get('/products/all', [IndexController::class, 'getProducts']);
Route::get('/product/{id}', [IndexController::class, 'getProduct']);
Route::get('/merchants', [IndexController::class, 'getMerchants']);
Route::get('/merchants/{id}', [IndexController::class, 'getMerchant']);

Route::get('/categories', [CategoryController::class, 'all']);
Route::get('/category/{id}', [CategoryController::class, 'get']);

Auth::routes();

Route::get('/user/account', [HomeController::class, 'index'])->name('home');
Route::get('/user/orders', [HomeController::class, 'getOrders'])->name('orders');
Route::get('/user/items', [HomeController::class, 'getItems'])->name('savedTtems');
Route::get('/user/address', [HomeController::class, 'getAddress'])->name('address');
Route::get('/user/notifications', [HomeController::class, 'notifications'])->name('notifications');
Route::get('/user/changepassword', [HomeController::class, 'changePassword'])->name('changePassword');


Route::get('/cart', [IndexController::class, 'viewCart'])->middleware('auth');
Route::post('/cart/add', [CartController::class, 'addItem']);
Route::post('/cart/update', [CartController::class, 'updateQuantity']);
Route::post('/cart/remove', [CartController::class, 'removeItem']);
Route::get('/items', [CartController::class, 'getCartItems']);
Route::get('/checkout', [CartController::class, 'review'])->middleware('auth');
Route::post('/checkout', [CartController::class, 'checkout'])->middleware('auth');
Route::get('/verify', [CartController::class, 'verify']);
