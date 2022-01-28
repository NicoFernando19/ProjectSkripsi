<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    protected $fillable = [
        'type_name'
    ];

    public function Company()
    {
        return $this->hasOne(Company::class);
    }
}