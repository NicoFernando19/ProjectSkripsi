<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'company_id',
        'documentType',
        'documentName',
        'pathUrl',
        'mime'
    ];

    public function Company() {
        return $this->belongsTo(Company::class);
    }
}