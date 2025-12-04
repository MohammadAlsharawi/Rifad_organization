<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LastestUpdate extends Model
{
    protected $table = 'lastest_updates';
    protected $fillable = [
        'title',
        'description',
        'photo',
        'date',
        'time'
    ] ;
}
