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

    public function CompanyTransaction () {
        return $this->belongsToMany(Company::class, 'transactions', 'vacancy_id', 'company_id');
    }
}