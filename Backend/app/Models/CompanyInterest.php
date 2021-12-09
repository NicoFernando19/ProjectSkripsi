<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInterest extends Model
{
    protected $fillable = [
        // 'company_id',
        'companyName',
        'companyType',
        'jobDesc',
        'NumOfWorkforce',
        'price',
        'specification'
    ];

    public function Company() {
        return $this->belongsTo(Company::class);
    }

    public function AppliedVacancy() {
        return $this->belongsToMany(Vacancy::class, 'joined_companies', 'vacancy_id', 'company_interest_id');
    }

    public function Document() {
        return $this->hasMany(Document::class);
    }
}