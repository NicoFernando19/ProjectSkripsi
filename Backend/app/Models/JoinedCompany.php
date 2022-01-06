<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinedCompany extends Model
{
    protected $fillable = [
        'company_interest_id',
        'vacancy_id'
    ];
}