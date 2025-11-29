<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceYear extends Model
{
    protected $fillable = ['name'];

    public function iTeachForSyrias()
    {
        return $this->hasMany(ITeachForSyria::class);
    }
}
