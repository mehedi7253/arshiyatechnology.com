<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Page\PageController;
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

//front page routes
Route::get('/', [PageController::class, 'index']);
Route::post('/cart/add', [PageController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/increment', [PageController::class, 'incrementCartItem'])->name('cart.increment');
Route::post('/cart/decrement', [PageController::class, 'decrementCartItem'])->name('cart.decrement');
Route::get('/cart', [PageController::class, 'getCart'])->name('cart.get');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/home',[AdminController::class, 'index'])->name('admin.home');
    Route::get('site-settings', [AdminController::class, 'applicationSetting'])->name('site-settings');
    Route::post('site-setting-update', [AdminController::class, 'updateApplicationSetting'])->name('settings-update');
    Route::get('about-settings', [AdminController::class, 'aboutUs'])->name('about-settings');
    Route::post('update-about',[AdminController::class, 'updateAboutUs'])->name('update-about');

    Route::get('mission-vision', [AdminController::class, 'missionVision'])->name('mission-vision');
    Route::post('update-mission-vision',[AdminController::class, 'updateMissionVision'])->name('update-mission-vision');
    Route::resource('banners', BannerController::class);

    Route::get('sfv', [AdminController::class, 'getService'])->name('get-service-FV');
    Route::post('update-service-facilities-values', [AdminController::class, 'updateSFV'])->name('update-service-facilities-values');

    Route::resource('products', ProductController::class);
});
