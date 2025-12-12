<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Labib extends Model
{
    use HasTranslations;
    protected $fillable = [
        'full_name',
        'province',
        'grade',
        'email',
        'phone',
        'course'
    ];
    public $translatable = [
        'full_name',
        'course',
        'province',
    ];
}
