<?php

use App\Http\Controllers\LantaiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/home', function () { return view('welcome'); })->name('welcome');

// Resource route untuk lantai
Route::resource('lantai', LantaiController::class);

// Route custom untuk mendapatkan ruangan berdasarkan lantai
Route::get('/lantai/{floorId}/ruangan', [LantaiController::class, 'getRoomsByFloor']);
Route::get('/ruang/{roomId}', [LantaiController::class, 'show'])->name('lantai.show');

// Route dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

