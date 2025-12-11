<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FriendLanguage extends Model
{
    use HasTranslations;

    protected $fillable = ['name'];
    public $translatable = ['name'];

    public function onlineArabicPaths()
    {
        return $this->hasMany(OnlineArabicPath::class, 'friends_language_id');
    }
}
