<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'playstore_link',
        'appstore_link',
        'features',
        'order',
        'is_active'
    ];

    protected $casts = [
        'features' => 'json',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Gera um slug a partir do título
    public static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (!$project->slug) {
                $project->slug = \Str::slug($project->title);
            }
        });
    }
}