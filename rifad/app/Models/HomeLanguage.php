<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeLanguage extends Model
{
    protected $fillable = ['name'];

    public function onlineArabicPaths()
    {
        return $this->hasMany(OnlineArabicPath::class, 'home_language_id');
    }
}
