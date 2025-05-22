<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Показати список завдань.
     */
    public function index()
    {
        return view('tasks.index');
    }
}
