<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    protected $fillable = [
        'company_id',
        'Title',
        'isActive'
    ];

    public function Company() {
        return $this->belongsTo(Company::class);
    }
}