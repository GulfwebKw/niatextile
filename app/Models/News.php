<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{

    use HasTranslations;
    protected $fillable = [
        'title',
        'sub_title',
        'short_content',
        'content',
        'image',
        'is_active',
        'author_id',
    ];

    public $translatable =  [
        'title',
        'sub_title',
        'content',
        'short_content',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'author_id' => 'int',
    ];

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
}
