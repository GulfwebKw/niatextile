<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class aboutSection extends Model
{
    use HasTranslations;
    protected $fillable = [
        'title',
        'content',
        'image',
        'use_inside_homepage',
        'is_active',
        'ordering',
    ];

    public $translatable =  [
        'title',
        'content',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'use_inside_homepage' => 'boolean',
        'ordering' => 'integer',
    ];
}
