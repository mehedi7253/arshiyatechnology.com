<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'user-access:admin', 'mail-service'])->group(function () {
    Route::get('dashboard',[AdminController::class, 'index'])->name('dashboard');
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
    Route::get('products/{product}/gallery/{galleryImage}', [ProductController::class, 'galleryImageDelete'])->name('products.gallery.delete');

    //EMAIL SETTING ROUTE LIST ==========>
    Route::get('email-setting', [AdminController::class, 'emailSettingIndex'])->name('email-setting.index');
    Route::post('email-setting/update', [AdminController::class, 'emailSettingUpdate'])->name('email-setting.update');
    // Route::get('email-setting/test-mail', [AdminController::class, 'testMail'])->middleware('mail-service')->name('email-setting.test-mail');
    Route::post('email-setting/test-mail', [AdminController::class, 'testMail'])->middleware('mail-service')->name('email-setting.test-mail');

    //orders
    Route::get('orders', [AdminController::class, 'allOrder'])->name('order.index');
    Route::get('oder-details/{id}', [AdminController::class, 'orderDetails'])->name('order.details');
    Route::get('/order/{id}/status/{status}', [AdminController::class, 'updateStatus'])->name('order.status');

    //category
    Route::resource('categories', CategoryController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('menus', MenuController::class);
});
