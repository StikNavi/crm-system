<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'photo', 
        'full_name', 
        'position', 
        'experience'
    ];
}