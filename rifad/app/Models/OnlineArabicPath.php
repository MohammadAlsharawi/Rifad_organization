<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineArabicPath extends Model
{
    protected $fillable = [
        'full_name','birth_date','gender','grade','parent_name','phone','email',
        'origin_country','residence_country','speaks_arabic_id','reading_level_id',
        'home_language_id','friends_language_id','school_type_id','preferred_sections_id',
        'biggest_challenge_id','parent_reason_id','preferred_time_id',
        'has_difficulty','difficulty_details','notes','how_found_us','confirmed',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'has_difficulty' => 'boolean',
        'confirmed' => 'boolean',
    ];

    public function speaksArabic()     { return $this->belongsTo(SpeaksArabic::class); }
    public function readingLevel()     { return $this->belongsTo(ReadingLevel::class); }
    public function homeLanguage()     { return $this->belongsTo(HomeLanguage::class); }
    public function friendLanguage()   { return $this->belongsTo(FriendLanguage::class, 'friends_language_id'); }
    public function schoolType()       { return $this->belongsTo(SchoolType::class); }
    public function preferredSection() { return $this->belongsTo(PreferredSection::class, 'preferred_sections_id'); }
    public function biggestChallenge() { return $this->belongsTo(Challenge::class, 'biggest_challenge_id'); }
    public function parentReason()     { return $this->belongsTo(ParentReason::class); }
    public function preferredTime()    { return $this->belongsTo(PreferredTime::class); }
}
