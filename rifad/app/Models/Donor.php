<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Donor extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'donated_amount',
        'project_id',
        'donate',
        'status',
    ];

    public $translatable = ['name'];

    protected $casts = [
        'donated_amount' => 'decimal:2',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
