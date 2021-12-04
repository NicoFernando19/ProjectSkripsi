<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'Title',
        'jobType',
        'jobDesc',
        'NumWorkfore',
        'Budget',
        'Requirement',
        'isActive',
        'PostDate',
        'Deadline'
    ];

    public function Company() {
        return $this->belongsTo(Company::class);
    }

    public function CompanyTransaction () {
        return $this->belongsToMany(Company::class, 'transactions', 'company_id', 'vacancy_id');
    }
}