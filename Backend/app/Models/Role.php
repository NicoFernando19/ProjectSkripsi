<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name'
    ];

    public function Companies(){
        return $this->belongsToMany(Company::class, 'company_roles', 'company_id', 'role_id');
    }
}