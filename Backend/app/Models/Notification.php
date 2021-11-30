<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'type',
        'company_id',
        'data',
        'read_at'
    ];

    public function Company() {
        return $this->belongsTo(Company::class);
    }
}