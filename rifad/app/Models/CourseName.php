<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CourseName extends Model
{
    use HasTranslations;
    protected $table = 'course_names';

    protected $fillable = ['name'];
    public $translatable = ['name'];

    public function iTeachForSyrias()
    {
        return $this->hasMany(ITeachForSyria::class, 'course_id');
    }
}

