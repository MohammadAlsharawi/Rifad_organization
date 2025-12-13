<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Challenge extends Model
{
    use HasTranslations;

    protected $fillable = ['name'];

    public $translatable = ['name'];

    public function onlineArabicPaths()
    {
        return $this->hasMany(OnlineArabicPath::class, 'biggest_challenge_id');
    }
}
