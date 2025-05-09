<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\User;

class RatingController extends Controller
{
    // Показує форму оцінювання
    public function create()
    {
        $employees = User::where('role', 'employee')->get();
        return view('ratings.create', compact('employees'));
    }

    // Зберігає оцінку
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:users,id',
            'score' => 'required|integer|min:1|max:5',
        ]);

        Rating::create([
            'employee_id' => $request->employee_id,
            'score' => $request->score,
        ]);

        return redirect()->route('ratings.create')->with('success', 'Оцінка збережена!');
    }
}
