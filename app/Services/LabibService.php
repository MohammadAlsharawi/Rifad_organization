<?php

namespace App\Services;

use App\Models\Labib;
use Exception;

class LabibService
{
    public function store(array $data): Labib
    {
        try {
            $labib = Labib::create([
                'grade' => $data['grade'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);

            $labib->setTranslation('full_name', 'en', $data['full_name_en']);
            $labib->setTranslation('full_name', 'ar', $data['full_name_ar']);

            $labib->setTranslation('province', 'en', $data['province_en']);
            $labib->setTranslation('province', 'ar', $data['province_ar']);

            $labib->setTranslation('course', 'en', $data['course_en']);
            $labib->setTranslation('course', 'ar', $data['course_ar']);

            $labib->save();

            return $labib;
        } catch (Exception $e) {
            throw new Exception("Failed to create Labib: " . $e->getMessage());
        }
    }

}
