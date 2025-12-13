<?php

namespace App\Services;

use App\Models\CourseName;
use App\Models\Degree;
use App\Models\ExperienceYear;
use App\Models\ITeachForSyria;
use App\Models\Need;
use App\Models\Sector;
use App\Models\TrainingType;

class ITeachForSyriaService
{
    public function store(array $data)
    {
        try {
            $ITeachForSyria = ITeachForSyria::create([
                'phone'            => $data['phone'],
                'email'            => $data['email'],
                'birth_year'       => $data['birth_year'],
                'degree_id'        => $data['degree_id'],
                'sector_id'        => $data['sector_id'],
                'experience_year_id'=> $data['experience_year_id'],
                'training_type_id' => $data['training_type_id'],
                'need_id'          => $data['need_id'],
                'course_id'        => $data['course_id'],
                'confirmed'        => $data['confirmed'] ?? false,
                'gender'           => $data['gender'],
            ]);

            $ITeachForSyria->setTranslation('full_name', 'en', $data['full_name']['en']);
            $ITeachForSyria->setTranslation('full_name', 'ar', $data['full_name']['ar']);

            $ITeachForSyria->setTranslation('residence', 'en', $data['residence']['en']);
            $ITeachForSyria->setTranslation('residence', 'ar', $data['residence']['ar']);

            $ITeachForSyria->save();

            return $ITeachForSyria;
        } catch (\Exception $e) {
            throw new \Exception("Failed to create Volunteer: " . $e->getMessage());
        }
    }
    public function getFormData()
    {
        try {
            return [
                'degrees' => Degree::all()->map(fn ($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'sectors' => Sector::all()->map(fn ($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'experience_years' => ExperienceYear::all()->map(fn ($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'training_types' => TrainingType::all()->map(fn ($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'needs' => Need::all()->map(fn ($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'courses' => CourseName::all()->map(fn ($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
            ];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
