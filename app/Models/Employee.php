<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'emp_name',
        'birthday',
        'gender',
        'phone',
        'address',
        'email',
        
        'joined_date',
        'image',
    ];
}
