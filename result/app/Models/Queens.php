<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queens extends Model
{
    protected $table = 'branchq';

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
