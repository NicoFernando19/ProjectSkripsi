<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id', 
        'address',
        'address2',
        'country',
        'city',
        'state',
        'zip',
        'about',
        'jobTitle',
        'jobDesc'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}