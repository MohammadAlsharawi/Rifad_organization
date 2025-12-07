<?php

namespace App\Services;

use App\Models\Anaab;
use App\Models\Residence;
use Exception;

class AnaabService
{
    public function store(array $data): Anaab
    {
        try {
            return Anaab::create($data);
        } catch (Exception $e) {
            throw new Exception("Failed to create Anaab: " . $e->getMessage());
        }
    }

    public function getResidences()
    {
        try {
            return Residence::all();
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve residences: " . $e->getMessage());
        }
    }

    
}
