<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class Company extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject, CanResetPasswordContract
{
    use Authenticatable, Authorizable, HasFactory, CanResetPassword;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username', 
        'email', 
        'DoB',
        'roles',
        'phoneNumber',
        'TanggalBerdiri',
        'WebsiteUrl',
        'BidangUsaha',
        'Industri',
        'SubIndustri', 
        'about',
        'address',
        'company_type_id',
        'address2',
        'country',
        'city',
        'state',
        'zip',
        'imgName',
        'lastLogin',
        'isActive',
        'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
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

    public function Roles(){
        return $this->belongsToMany(Role::class, 'company_roles', 'company_id', 'role_id');
    }

    public function Notification() {
        return $this->hasMany(Notification::class);
    }

    public function Document() {
        return $this->hasMany(Document::class);
    }

    public function Vacancy() {
        return $this->hasMany(Vacancy::class);
    }

    public function VacancyInterest () {
        return $this->belongsToMany(Vacancy::class, 'transactions', 'company_id', 'vacancy_id');
    }

    public function CompanyType()
    {
        return $this->belongsTo(CompanyType::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
