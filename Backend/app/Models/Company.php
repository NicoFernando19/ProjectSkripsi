<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'companyName',
        'companyDetails', 
        'address'
    ];

    public function User()
    {
        return $this->hasOne(User::class);
    }
}