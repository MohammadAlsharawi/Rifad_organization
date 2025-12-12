<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ITeachForSyria extends Model
{
    use HasTranslations;

    protected $fillable = [
        'full_name','phone','email','residence','birth_year','gender',
        'degree_id','sector_id','experience_year_id','training_type_id',
        'need_id','course_id','confirmed',
    ];
    public $translatable = [
        'full_name',
        'residence',
    ];

    protected $casts = [
        'confirmed' => 'boolean',
        'birth_year' => 'integer',
        'gender' => 'string',
    ];

    public function degree()         { return $this->belongsTo(Degree::class); }
    public function sector()         { return $this->belongsTo(Sector::class); }
    public function experienceYear() { return $this->belongsTo(ExperienceYear::class); }
    public function trainingType()   { return $this->belongsTo(TrainingType::class); }
    public function need()           { return $this->belongsTo(Need::class); }
    public function course()         { return $this->belongsTo(CourseName::class, 'course_id'); }
}
