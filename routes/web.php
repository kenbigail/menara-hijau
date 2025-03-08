<?php

use App\Http\Controllers\AvailablePageController;
use App\Http\Controllers\FloorDashController;
use App\Http\Controllers\LantaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/home', function () { return view('welcome'); })->name('welcome');

// Route untuk halaman available space
Route::get('/available-space', [AvailablePageController::class, 'index'])->name('available-space');

// Resource route untuk lantai
Route::resource('lantai', LantaiController::class);

// Route custom untuk mendapatkan ruangan berdasarkan lantai
Route::get('/lantai/{floorId}/ruangan', [LantaiController::class, 'getRoomsByFloor']);
Route::get('/ruang/{roomId}', [LantaiController::class, 'show'])->name('ruang.show');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth', 'superAdmin')->group(function () {
    Route::resource('users', UserDashController::class);
});

Route::middleware('auth', 'verified')->group(function () {
    Route::resource('management', FloorDashController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

