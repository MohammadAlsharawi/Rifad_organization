<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = ['name'];

    public function volunteerings()
    {
        return $this->hasMany(Volunteering::class);
    }
}
