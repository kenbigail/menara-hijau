<?php

use App\Http\Controllers\FloorDashController;
use App\Http\Controllers\LantaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/home', function () { return view('welcome'); })->name('welcome');

// Resource route untuk lantai
Route::resource('lantai', LantaiController::class);

// Route custom untuk mendapatkan ruangan berdasarkan lantai
Route::get('/lantai/{floorId}/ruangan', [LantaiController::class, 'getRoomsByFloor']);
Route::get('/ruang/{roomId}', [LantaiController::class, 'show'])->name('lantai.show');

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/management', [FloorDashController::class, 'index'])->name('management.index');
    Route::get('/users', [UserDashController::class, 'index'])->name('users.index');
});



=======
// Route dengan middleware auth
>>>>>>> cf2a63869c68d89bddbec1e0ab9be78024474c60
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

