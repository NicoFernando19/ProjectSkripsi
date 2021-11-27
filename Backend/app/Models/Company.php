<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Company extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'companyName',
        'email',
        'companyPhone',
        'TanggalBerdiri',
        'WebsiteUrl',
        'BidangUsaha',
        'Industri',
        'SubIndustri', 
        'companyDetails', 
        'address',
        'company_type_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

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