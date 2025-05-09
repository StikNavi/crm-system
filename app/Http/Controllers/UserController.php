<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index'); // Перегляд списку користувачів
    }

    public function show($id)
    {
        // Логіка для показу конкретного користувача
    }

    public function store(Request $request)
    {
        // Логіка для створення нового користувача
    }
}