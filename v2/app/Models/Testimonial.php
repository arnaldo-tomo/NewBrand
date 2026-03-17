<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'content',
        'name',
        'title',
        'avatar',
        'linkedin_url',
        'order',
        'is_active',
    ];
}
