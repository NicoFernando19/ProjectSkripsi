<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyContract extends Model
{
    protected $fillable = [
        'company_id', 
        'contract_id'
    ];
}