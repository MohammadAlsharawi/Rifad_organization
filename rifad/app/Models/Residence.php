<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    protected $fillable = ['name'];

    public function anaabs()
    {
        return $this->hasMany(Anaab::class);
    }
}
