<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribes extends Model
{
    protected $fillable = ['email'];
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $incrementing  = false;
}
