<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Walton extends Model
{
    protected $table = 'branchw';

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
