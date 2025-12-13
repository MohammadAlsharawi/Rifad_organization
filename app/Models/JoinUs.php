<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class JoinUs extends Model
{
        use HasTranslations;
    protected $table = "join_uses";
    protected $fillable = ['name','email','address','phone','comments','cv','confirmed'];
    public $translatable = [
        'name',
        'address',
    ];

    protected $casts = [
        'confirmed' => 'boolean',
    ];
}
