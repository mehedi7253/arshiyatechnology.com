<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Page\PageController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::name('page.')->middleware('mail-service')->group(function () {
    Route::get('/', [PageController::class, 'index']);
    Route::get('all-products', [PageController::class, 'allProduct'])->name('all-product');
});


require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';



// front page routes

// Route::get('/product-details/{slug}', [PageController::class, 'productDetails'])->name('product.details');
// Route::resource('/orders', OrderController::class);
// Route::get('orders',[OrderController::class, 'index'])->name('orders.index');
// Route::post('orders/store', [OrderController::class,'store'])->middleware('mail-service')->name('orders.store');

// // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // Route::get('/products', [PageController::class, 'products'])->name('products.index');
// // // Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');

// Route::post('/cart/add', [CartController::class, 'addToCart']);
// Route::post('/cart/update', [CartController::class, 'updateCart']);
// Route::post('/cart/remove', [CartController::class, 'removeCart']);
// // Route::delete('/remove-item/{productId}', [PageController::class, 'removeItem'])->name('cart.remove');
// Route::delete('/cart/remove{productId}', [CartController::class, 'removeProduct']);
// Route::get('/cart', [CartController::class, 'getCart'])->name('cart.index');

// //shop product
// Route::get('shop', [ShopController::class,'index'])->name('shop.index');
// Route::get('category-product/{slug}', [ShopController::class,'categoryProduct'])->name('category.product');
