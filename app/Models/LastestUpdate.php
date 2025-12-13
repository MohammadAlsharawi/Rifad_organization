<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LastestUpdate extends Model
{
    use HasTranslations;
    protected $table = 'lastest_updates';
    protected $fillable = [
        'title',
        'description',
        'photo',
        'date',
        'time'
    ];
    public $translatable = [
        'title',
        'description',
    ];
}
