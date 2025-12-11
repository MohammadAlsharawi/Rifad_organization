<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class VolunteerType extends Model
{
    use HasTranslations;

    protected $fillable = ['name'];
    public $translatable = ['name'];

    public function volunteerings()
    {
        return $this->hasMany(Volunteering::class, 'preferred_type_id');
    }
}
