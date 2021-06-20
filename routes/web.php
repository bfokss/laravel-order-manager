<?php

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

Route::get('/', function () {
    return view('landing_page');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Tylko zalogowani
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users_list', [App\Http\Controllers\DashboardController::class, 'index'])->name('users_list');
    Route::get('/add_to_cart/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/delete/{itemId}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
    Route::get('/cart/update/{itemId}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
});

// Tylko admini
Route::group(['middleware' => ['auth', 'Admin']], function () {
    Route::get('/main_content', [App\Http\Controllers\AdminController::class, 'home'])->name('main_content');
    Route::get('/users_list', [App\Http\Controllers\AdminController::class, 'users_list'])->name('users_list');
    Route::get('/products', [App\Http\Controllers\AdminController::class, 'products'])->name('products');
});
