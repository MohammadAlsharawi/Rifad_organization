<?php

namespace App\Services;

use App\Models\Volunteering;
use App\Models\Qualification;
use App\Models\VolunteerType;
use Exception;

class VolunteeringService
{
    public function store(array $data): Volunteering
    {
        try {
            $volunteering = Volunteering::create([
                'email'             => $data['email'],
                'gender'            => $data['gender'] ?? null,
                'phone'             => $data['phone'] ?? null,
                'age'               => $data['age'] ?? null,
                'qualification_id'  => $data['qualification_id'],
                'preferred_type_id' => $data['preferred_type_id'],
                'photo_consent'     => $data['photo_consent'],
            ]);

            $volunteering->setTranslation('name', 'en', $data['name_en']);
            $volunteering->setTranslation('name', 'ar', $data['name_ar']);

            $volunteering->setTranslation('address', 'en', $data['address_en'] ?? '');
            $volunteering->setTranslation('address', 'ar', $data['address_ar'] ?? '');

            $volunteering->save();

            return $volunteering;
        } catch (Exception $e) {
            throw new Exception("Failed to create Volunteering: " . $e->getMessage());
        }
    }


    public function getAllFkData(): array
    {
        try {
            return [
                'qualifications' => Qualification::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
                'preferred_types' => VolunteerType::all()->map(fn($item) => [
                    'id'   => $item->id,
                    'name' => $item->getTranslation('name', app()->getLocale()),
                ]),
            ];
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve FK data: " . $e->getMessage());
        }
    }

}
