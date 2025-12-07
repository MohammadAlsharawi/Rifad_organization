<?php

namespace App\Services;

use App\Models\Labib;
use Exception;

class LabibService
{
    public function store(array $data): Labib
    {
        try {
            return Labib::create($data);
        } catch (Exception $e) {
            throw new Exception("Failed to create Labib: " . $e->getMessage());
        }
    }

}
