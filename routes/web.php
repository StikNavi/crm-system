<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'edit'])->name('user.profile.edit');  // Заміна на метод редагування профілю
    Route::patch('/user/profile', [UserController::class, 'update'])->name('user.profile.update'); // Заміна на метод оновлення профілю
    Route::delete('/user/profile', [UserController::class, 'destroy'])->name('user.profile.destroy'); // Заміна на метод видалення профілю
});

require __DIR__.'/auth.php';
