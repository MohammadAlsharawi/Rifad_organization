<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreferredTime extends Model
{
    protected $fillable = ['name'];

    public function onlineArabicPaths()
    {
        return $this->hasMany(OnlineArabicPath::class, 'preferred_time_id');
    }
}
