<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;


Route::get('/', [EmployeeController::class, 'index'])->name('home');

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});

// web.php
Route::get('/', [EmployeeController::class, 'index'])->name('home');
Route::get('/dashboard', [EmployeeController::class, 'index']) // Додано цей рядок
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



// Тимчасовий маршрут для get
Route::get('get', function () {
    return view('welcome');
});

// Роутинги для профілю (після авторизації)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Сторінка адміністрування (доступна тільки адміну)
    Route::get('/admin/dashboard', [RatingController::class, 'create'])->middleware(IsAdmin::class)->name('admin.dashboard');

    // Сторінка працівників
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

    // Сторінка завдань
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
});

// Аутентифікаційні маршрути
require __DIR__.'/auth.php';
