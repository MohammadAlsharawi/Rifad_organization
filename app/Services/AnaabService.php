<?php

namespace App\Services;

use App\Models\Anaab;
use App\Models\Residence;
use Exception;

class AnaabService
{
    public function store(array $data)
    {
        try {
            $anaab = Anaab::create([
                'phone'        => $data['phone'],
                'email'        => $data['email'],
                'residence_id' => $data['residence_id'],
            ]);

            $anaab->setTranslation('name', 'en', $data['name_en']);
            $anaab->setTranslation('name', 'ar', $data['name_ar']);
            $anaab->save();

            return $anaab;
        } catch (Exception $e) {
            throw new Exception("Failed to create Anaab: " . $e->getMessage());
        }
    }

    public function getResidences()
    {
        try {
            return Residence::all()->map(function ($residence) {
                return [
                    'id'   => $residence->id,
                    'name' => $residence->getTranslation('name', app()->getLocale()),
                ];
            });
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve residences: " . $e->getMessage());
        }
    }



}
