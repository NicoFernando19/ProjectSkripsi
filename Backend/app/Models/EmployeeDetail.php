<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    protected $fillable = [
        'user_id', 
        'address',
        'country',
        'city',
        'about',
        'jobTitle',
        'jobDesc'
    ];
}