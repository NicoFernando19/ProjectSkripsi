<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// $table->id();
//             $table->string('businessName');
//             $table->string('vendorName');
//             $table->integer('workforce');
//             $table->string('jobFunction');
//             $table->longText('requirement')->nullable();
//             $table->string('document');
//             $table->timestamps();
class Contract extends Model
{
    protected $fillable = [
        'businessName',
        'vendorName',
        'workforce',
        'jobFunction',
        'requirement',
        'document'
    ];

}