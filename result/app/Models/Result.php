<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'rollno', 
        'stname', 
        'tname', 
        'cltime', 
        'course', 
        'month', 
        'online', 
        'assesment', 
        'attendance', 
        'total'
    ];
}
