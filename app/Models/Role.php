<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name'
    ];

    public function Company(){
        return $this->hasOne(Company::class);
    }
}