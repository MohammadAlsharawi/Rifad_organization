<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anaab extends Model
{
    protected $fillable = ['name','phone','email','residence_id'];

    public function residence()
    {
        return $this->belongsTo(Residence::class);
    }
}
