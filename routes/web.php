<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\DashboardController;

// Root langsung ke dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard ringkasan
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Donatur, Donasi, Zakat
    Route::resource('donaturs', DonaturController::class);
    Route::resource('donasis', DonasiController::class);
    Route::resource('zakats', ZakatController::class);
});

require __DIR__.'/auth.php';
