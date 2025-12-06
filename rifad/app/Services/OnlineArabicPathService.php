<?php

namespace App\Services;

use App\Models\Challenge;
use App\Models\FriendLanguage;
use App\Models\HomeLanguage;
use App\Models\OnlineArabicPath;
use App\Models\ParentReason;
use App\Models\PreferredSection;
use App\Models\PreferredTime;
use App\Models\ReadingLevel;
use App\Models\SchoolType;
use App\Models\SpeaksArabic;
use Exception;

class OnlineArabicPathService
{
    public function store(array $data)
    {
        try {
            return OnlineArabicPath::create($data);
        } catch (Exception $e) {
            throw new Exception("Failed to create student: " . $e->getMessage());
        }
    }

    public function index()
    {
        try {
            return OnlineArabicPath::all();
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve students: " . $e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            return OnlineArabicPath::findOrFail($id);
        } catch (Exception $e) {
            throw new Exception("Student not found: " . $e->getMessage());
        }
    }

    public function getAllFkData(): array
    {
        try {
            return [
                'speaks_arabic'      => SpeaksArabic::all(),
                'reading_levels'     => ReadingLevel::all(),
                'home_languages'     => HomeLanguage::all(),
                'friends_languages'  => FriendLanguage::all(),
                'school_types'       => SchoolType::all(),
                'preferred_sections' => PreferredSection::all(),
                'biggest_challenges' => Challenge::all(),
                'parent_reasons'     => ParentReason::all(),
                'preferred_times'    => PreferredTime::all(),
            ];
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve FK data: " . $e->getMessage());
        }
    }
}
