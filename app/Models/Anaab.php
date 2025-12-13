<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Anaab extends Model
{
    use HasTranslations;
    protected $fillable = ['name','phone','email','residence_id'];
    public $translatable = ['name'];

    public function residence()
    {
        return $this->belongsTo(Residence::class);
    }
}
