<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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

    Route::resource('orders', OrderController::class);


    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/home', function () {
        return redirect('/dashboard');
    });

    Route::get('/user_content', [App\Http\Controllers\UserController::class, 'home'])->name('user_content');
    Route::get('/orders_list', [App\Http\Controllers\UserController::class, 'orders'])->name('orders_list');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users_list', [App\Http\Controllers\DashboardController::class, 'index'])->name('users_list');

    //Cart
    Route::get('/add_to_cart/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/delete/{itemId}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
    Route::get('/cart/update/{itemId}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');

    //Products
    Route::get('/add_to_cart/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::get('/users_products', [App\Http\Controllers\UserController::class, 'products'])->name('products');
    Route::get('/product/{itemId}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

    //Orders
    Route::get('/orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('orders');
    Route::get('/orders/{orderId}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
});

// Tylko admini
Route::group(['middleware' => ['auth', 'Admin']], function () {
    Route::get('/main_content', [App\Http\Controllers\AdminController::class, 'home'])->name('main_content');
    Route::get('/users_list', [App\Http\Controllers\AdminController::class, 'users_list'])->name('users_list');
    Route::get('/products', [App\Http\Controllers\AdminController::class, 'products'])->name('products');


    //Orders
    Route::get('/orders/{orderId}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/orders/{orderId}/edit', [App\Http\Controllers\OrderController::class, 'edit'])->name('orders.edit');
    Route::post('/orders/{orderId}', [App\Http\Controllers\OrderController::class, 'update'])->name('orders.update');

    //Products
    Route::resource('product', ProductController::class);
    //Route::get('/product/{itemId}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
    //Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('/product/{orderId}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/{itemId}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{orderId}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
});
