<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'category')->name('category');
    Route::get('/product-details/{id}/{slug}', 'productDetails')->name('product-details');
});

Route::middleware(['auth', 'role:user'])->name('user.')->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::get('/user-profile', 'userProfile')->name('profile');
        Route::get('/pending-orders', 'pendingOrders')->name('pending-orders');
        Route::get('/history', 'history')->name('history');
        Route::get('/cart', 'cart')->name('cart');
        Route::get('/shipping-address', 'shippingAddress')->name('shipping-address');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::post('/add-shipping-address', 'addShippingAddress')->name('add-shipping-address');
        Route::post('/order', 'order')->name('order');
        Route::post('/add-product-to-cart/{id}', 'addProductToCart')->name('add-product-to-cart');
        Route::delete('/cart/{id}', 'cartDelete')->name('cart-delete');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->prefix('admin')->group(function () {
        Route::get('dashboard', 'index')->name('admin-dashboard');
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubCategoryController::class);
        Route::get('edit-product-image/{id}', [ProductController::class, 'editImage'])->name('edit-image');
        Route::put('update-product-image/{id}', [ProductController::class, 'updateImage'])->name('update-image');
        Route::resource('product', ProductController::class);
        Route::resource('order', OrderController::class);
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
