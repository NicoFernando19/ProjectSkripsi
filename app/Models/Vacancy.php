<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'Title',
        'jobType',
        'jobDesc',
        'NumWorkforce',
        'Budget',
        'Requirement',
        'isActive',
        'PostDate',
        'Deadline'
    ];

    public function Company() {
        return $this->belongsTo(Company::class);
    }

    public function CompanyInterest() {
        return $this->belongsToMany(CompanyInterest::class, 'joined_companies', 'vacancy_id', 'company_interest_id');
    }

    public function Contract() {
        return $this->belongsTo(Contract::class);
    }
}