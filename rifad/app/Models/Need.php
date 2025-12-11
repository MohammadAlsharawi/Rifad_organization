<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Need extends Model
{
    use HasTranslations;

    protected $fillable = ['name'];
    public $translatable = ['name'];

    public function iTeachForSyrias()
    {
        return $this->hasMany(ITeachForSyria::class);
    }
}
