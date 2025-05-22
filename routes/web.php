<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;


Route::get('/', [EmployeeController::class, 'index'])->name('home');

Route::get('/dashboard', [EmployeeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/employees/{employee}/task/create', [TaskController::class, 'create'])->name('employees.tasks.create');


Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');



Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store')->middleware('auth');

// Тимчасовий маршрут
Route::get('get', function () {
    return view('welcome');
});

// 🔐 Авторизовані користувачі
Route::middleware('auth')->group(function () {
    // Профіль
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Працівники
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');


    // 🔐 Завдання доступні клієнту (для затвердження)
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks/{task}/approve', [TaskController::class, 'approve'])->name('tasks.approve');
    Route::post('/tasks/{task}/reject', [TaskController::class, 'reject'])->name('tasks.reject');
});

// 🔐 Адмін доступ
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [RatingController::class, 'create'])->name('admin.dashboard');

    // Створення працівників
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    // 🆕 Адміністратор призначає вартість
    Route::get('/admin/tasks', [TaskController::class, 'adminTasks'])->name('admin.tasks');
    Route::post('/admin/tasks/{task}/set-price', [TaskController::class, 'setPrice'])->name('tasks.setPrice');
});

require __DIR__.'/auth.php';
