<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class ClientTaskController extends Controller
{
    public function confirm(Request $request, Task $task) {
        $request->validate(['decision' => 'required|in:approved,rejected']);
        $task->update(['status' => $request->decision]);
        return back()->with('success', 'Ваш вибір збережено');
    }
}