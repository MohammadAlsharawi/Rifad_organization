<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendLanguage extends Model
{
    protected $fillable = ['name'];

    public function onlineArabicPaths()
    {
        return $this->hasMany(OnlineArabicPath::class, 'friends_language_id');
    }
}
