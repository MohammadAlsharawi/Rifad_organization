<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Organization extends Model
{
    use HasTranslations;

    protected $fillable = ['name'];
    public $translatable = ['name'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function donors()
    {
        return $this->hasMany(Donor::class);
    }
}
