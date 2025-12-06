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

    public function index()
    {
        try {
            return Labib::all();
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve Labibs: " . $e->getMessage());
        }
    }

    public function show(int $id): Labib
    {
        try {
            return Labib::findOrFail($id);
        } catch (Exception $e) {
            throw new Exception("Labib not found: " . $e->getMessage());
        }
    }
}
