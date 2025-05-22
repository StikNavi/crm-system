<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    public function index() {
        $tasks = Task::where('status', 'pending')->orWhere('status', 'waiting_price')->get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function setPrice(Request $request, Task $task) {
        $request->validate(['price' => 'required|numeric|min:0']);
        $task->update([
            'price' => $request->price,
            'status' => 'waiting_client_confirmation',
        ]);
        return back()->with('success', 'Ціну встановлено');
    }
}