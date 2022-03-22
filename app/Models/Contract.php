<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'company_id',
        'vendor_id',
        'vacancy_id',
        'workforce',
        'jobFunction',
        'jobDesc',
        'start_date',
        'end_date',
        'status',
        'document',
        'requirement',
        'feedbackNotes'
    ];

    // public function Company(){
    //     return $this->belongsTo(Company::class);
    // }

    public function Companies() {
        return $this->belongsToMany(Company::class, 'company_contracts', 'contract_id', 'company_id');
    }

    public function Vendor() {
        return $this->belongsTo(Company::class, 'vendor_id');
    }

    public function Vacancy() {
        return $this->hasOne(Vacancy::class);
    }

}