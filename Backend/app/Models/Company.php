<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'companyName',
        'companyEmail',
        'companyPhone',
        'TanggalBerdiri',
        'Website',
        'BidangUsaha',
        'Industri',
        'SubIndustri', 
        'companyDetails', 
        'address',
        'Company_type_id'
    ];

    public function User()
    {
        return $this->hasOne(User::class);
    }

    public function Employee(){
        return $this->hasMany(Employee::class);
    }

    public function CompanyType() {
        return $this->belongsTo(CompanyType::class);
    }
}