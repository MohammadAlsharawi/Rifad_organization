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
            return Volunteering::create($data);
        } catch (Exception $e) {
            throw new Exception("Failed to create Volunteering: " . $e->getMessage());
        }
    }

    public function getAllFkData(): array
    {
        try {
            return [
                'qualifications'  => Qualification::all(),
                'preferred_types' => VolunteerType::all(),
            ];
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve FK data: " . $e->getMessage());
        }
    }
}
