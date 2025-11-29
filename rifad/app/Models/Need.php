<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    protected $fillable = ['name'];

    public function iTeachForSyrias()
    {
        return $this->hasMany(ITeachForSyria::class);
    }
}
