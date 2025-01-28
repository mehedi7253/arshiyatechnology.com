<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
});
