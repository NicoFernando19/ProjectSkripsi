<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    protected $fillable = [
        'employee_id', 
        'address',
        'address2',
        'country',
        'city',
        'zip',
        'about',
        'jobTitle',
        'jobDesc'
    ];

    public function Employee(){
        return $this->belongsTo(Employee::class);
    }
}