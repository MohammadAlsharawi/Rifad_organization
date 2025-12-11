<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasTranslations;

    protected $fillable = [
        'review',
        'name'
    ];
    public $translatable = [
        'name',
        'review'
    ];
}
