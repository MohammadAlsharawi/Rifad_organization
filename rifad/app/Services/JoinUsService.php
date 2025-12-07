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
            return JoinUs::create($data);
        } catch (Exception $e) {
            throw new Exception("Failed to create JoinUs: " . $e->getMessage());
        }
    }
}
