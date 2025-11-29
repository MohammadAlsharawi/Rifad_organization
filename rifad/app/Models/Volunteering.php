<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteering extends Model
{
    protected $fillable = [
        'name','email','gender','address','phone','age',
        'qualification_id','preferred_type_id','photo_consent',
    ];

    protected $casts = [
        'age' => 'integer',
        'photo_consent' => 'boolean',
    ];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function preferredType()
    {
        return $this->belongsTo(VolunteerType::class, 'preferred_type_id');
    }
}
