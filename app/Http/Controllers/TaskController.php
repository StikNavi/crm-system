<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(User $employee)
{
    return view('tasks.create', compact('employee'));
}


public function store(Request $request)
{
    $request->validate([
        'employee_id' => 'required|exists:users,id',
        'description' => 'required|string|max:1000',
        'deadline' => 'required|date|after_or_equal:today',
    ]);

    Task::create([
        'employee_id' => $request->employee_id,
        'user_id' => Auth::id(),
        'description' => $request->description,
        'deadline' => $request->deadline,
    ]);

    return redirect()->back()->with('success', 'Завдання успішно створено.');
}


}


