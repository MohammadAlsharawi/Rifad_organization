<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinUs extends Model
{
    protected $table = "join_uses";
    protected $fillable = ['name','email','address','phone','comments','cv','confirmed'];

    protected $casts = [
        'confirmed' => 'boolean',
    ];
}
