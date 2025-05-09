<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'edit'])->name('user.profile.edit');
    Route::patch('/user/profile', [UserController::class, 'update'])->name('user.profile.update');
    Route::delete('/user/profile', [UserController::class, 'destroy'])->name('user.profile.destroy');

    // Додано маршрути для рейтингу
    Route::get('/ratings/create', [RatingController::class, 'create'])->name('ratings.create');
    Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
});

require __DIR__.'/auth.php';
