<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class HomeController extends Controller
{
    public function index()
    {
        // Отримуємо всіх працівників, відсортованих за спаданням стажу
        $employees = Employee::orderByDesc('experience')->get();

        // Передаємо їх у view
        return view('home', compact('employees'));
    }
}
