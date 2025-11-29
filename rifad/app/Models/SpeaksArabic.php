<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeaksArabic extends Model
{
    protected $fillable = ['name'];

    public function onlineArabicPaths()
    {
        return $this->hasMany(OnlineArabicPath::class, 'speaks_arabic_id');
    }
}
