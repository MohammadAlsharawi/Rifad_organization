<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentReason extends Model
{
    protected $fillable = ['name'];

    public function onlineArabicPaths()
    {
        return $this->hasMany(OnlineArabicPath::class, 'parent_reason_id');
    }
}
