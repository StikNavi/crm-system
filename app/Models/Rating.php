<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['employee_id', 'score'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
