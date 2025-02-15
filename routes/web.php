<?php

use App\Http\Controllers\FloorDashController;
use App\Http\Controllers\LantaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home');})->name('home');

Route::get('/home', function () {return view('welcome');})->name('welcome');

Route::get('/lantai', function () {return view('lantai.index');})->name('lantai');

Route::get('/ruang', function () {return view('lantai.detail');})->name('ruang');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/management', [FloorDashController::class, 'index'])->name('management.index');
    Route::get('/users', [UserDashController::class, 'index'])->name('users.index');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
