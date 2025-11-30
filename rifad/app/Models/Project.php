<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'image','title','description','reason',
        'total_amount','secured_amount','organization_id'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'secured_amount' => 'decimal:2',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function donors()
    {
        return $this->hasMany(Donor::class);
    }
}
