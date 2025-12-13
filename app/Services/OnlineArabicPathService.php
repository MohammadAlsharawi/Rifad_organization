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
    public function store(array $data): OnlineArabicPath
    {
        try {
            $student = OnlineArabicPath::create([
                'birth_date'            => $data['birth_date'] ?? null,
                'gender'                => $data['gender'] ?? null,
                'grade'                 => $data['grade'] ?? null,
                'phone'                 => $data['phone'] ?? null,
                'email'                 => $data['email'] ?? null,
                'speaks_arabic_id'      => $data['speaks_arabic_id'],
                'reading_level_id'      => $data['reading_level_id'],
                'home_language_id'      => $data['home_language_id'],
                'friends_language_id'   => $data['friends_language_id'],
                'school_type_id'        => $data['school_type_id'],
                'preferred_sections_id' => $data['preferred_sections_id'],
                'biggest_challenge_id'  => $data['biggest_challenge_id'],
                'parent_reason_id'      => $data['parent_reason_id'],
                'preferred_time_id'     => $data['preferred_time_id'],
                'has_difficulty'        => $data['has_difficulty'] ?? false,
                'difficulty_details'    => $data['difficulty_details'] ?? null,
                'notes'                 => $data['notes'] ?? null,
                'how_found_us'          => $data['how_found_us'] ?? null,
                'confirmed'             => $data['confirmed'] ?? false,
            ]);

            $student->setTranslation('full_name', 'en', $data['full_name_en']);
            $student->setTranslation('full_name', 'ar', $data['full_name_ar']);

            $student->setTranslation('parent_name', 'en', $data['parent_name_en'] ?? '');
            $student->setTranslation('parent_name', 'ar', $data['parent_name_ar'] ?? '');

            $student->setTranslation('origin_country', 'en', $data['origin_country_en'] ?? '');
            $student->setTranslation('origin_country', 'ar', $data['origin_country_ar'] ?? '');

            $student->setTranslation('residence_country', 'en', $data['residence_country_en'] ?? '');
            $student->setTranslation('residence_country', 'ar', $data['residence_country_ar'] ?? '');

            $student->save();

            return $student;
        } catch (Exception $e) {
            throw new Exception("Failed to create student: " . $e->getMessage());
        }
    }


    public function getAllFkData(): array
    {
        try {
            return [
                'speaks_arabic' => SpeaksArabic::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'reading_levels' => ReadingLevel::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'home_languages' => HomeLanguage::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'friends_languages' => FriendLanguage::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'school_types' => SchoolType::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'preferred_sections' => PreferredSection::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'biggest_challenges' => Challenge::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'parent_reasons' => ParentReason::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'preferred_times' => PreferredTime::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
            ];
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve FK data: " . $e->getMessage());
        }
    }

}
