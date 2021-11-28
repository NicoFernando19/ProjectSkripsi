<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRole extends Model
{
    protected $fillable = [
        'company_id', 
        'role_id'
    ];
}