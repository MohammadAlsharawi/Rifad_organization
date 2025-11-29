<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerType extends Model
{
    protected $fillable = ['name'];

    public function volunteerings()
    {
        return $this->hasMany(Volunteering::class, 'preferred_type_id');
    }
}
