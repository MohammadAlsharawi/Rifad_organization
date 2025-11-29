<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreferredSection extends Model
{
    protected $fillable = ['name'];

    public function onlineArabicPaths()
    {
        return $this->hasMany(OnlineArabicPath::class, 'preferred_sections_id');
    }
}
