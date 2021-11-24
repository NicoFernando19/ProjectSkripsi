<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'documentType',
        'documentName',
        'pathUrl',
        'mime',
        'created_by'
    ];
}