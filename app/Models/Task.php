<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'employee_id', 'description', 'deadline', 'price', 'status'
    ];

    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function employee() {
        return $this->belongsTo(User::class, 'employee_id');
    }
}