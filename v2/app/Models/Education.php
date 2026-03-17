<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'title',
        'institution',
        'period',
        'description',
        'logo',
        'order',
        'is_active',
    ];
}
