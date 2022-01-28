<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'company_interest_id',
        'documentType',
        'documentName',
        'pathUrl',
        'mime'
    ];

    public function Company() {
        return $this->belongsTo(Company::class);
    }

    public function DocCompanyInterest() {
        return $this->belongsTo(CompanyInterest::class);
    }
}