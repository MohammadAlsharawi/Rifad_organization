<?php

namespace App\Services;

use App\Models\JoinUs;
use Exception;

class JoinUsService
{
    public function store(array $data): JoinUs
    {
        try {
            if (isset($data['cv'])) {
                $data['cv'] = $data['cv']->store('cv_uploads', 'public');
            }

            $joinUs = JoinUs::create([
                'email'     => $data['email'],
                'phone'     => $data['phone'],
                'comments'  => $data['comments'] ?? null,
                'cv'        => $data['cv'] ?? null,
                'confirmed' => $data['confirmed'] ?? false,
            ]);

            $joinUs->setTranslation('name', 'en', $data['name_en']);
            $joinUs->setTranslation('name', 'ar', $data['name_ar']);

            $joinUs->setTranslation('address', 'en', $data['address_en']);
            $joinUs->setTranslation('address', 'ar', $data['address_ar']);

            $joinUs->save();

            return $joinUs;
        } catch (Exception $e) {
            throw new Exception("Failed to create JoinUs: " . $e->getMessage());
        }
    }

}
