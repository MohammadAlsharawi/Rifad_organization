<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseName extends Model
{
    protected $table = 'course_names';
    protected $fillable = ['name'];

    public function iTeachForSyrias()
    {
        return $this->hasMany(ITeachForSyria::class, 'course_id');
    }
}

