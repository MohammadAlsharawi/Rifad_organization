<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations;
    protected $fillable = [
        'image','title','description','reason',
        'total_amount','secured_amount','organization_id',
        'status','category'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'secured_amount' => 'decimal:2',
    ];
    public $translatable = [
        'title',
        'description',
        'reason',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function donors()
    {
        return $this->hasMany(Donor::class);
    }
    public function getSecuredPercentageAttribute(): float
    {
        if ($this->total_amount <= 0) {
            return 0;
        }
        return round(($this->secured_amount / $this->total_amount) * 100, 2);
    }
}
