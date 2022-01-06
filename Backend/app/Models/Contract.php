<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'company_id',
        'vendor_id',
        'workforce',
        'jobFunction',
        'start_date',
        'end_date',
        'status',
        'document',
        'requirement',
        'feedbackNotes'
    ];

    public function Company(){
        return $this->belongsTo(Company::class);
    }

    public function Vendor() {
        return $this->belongsTo(Company::class, 'vendor_id');
    }

}