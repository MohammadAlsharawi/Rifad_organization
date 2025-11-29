<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingLevel extends Model
{
    protected $fillable = ['name'];

    public function onlineArabicPaths()
    {
        return $this->hasMany(OnlineArabicPath::class, 'reading_level_id');
    }
}
