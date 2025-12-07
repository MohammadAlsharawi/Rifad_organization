<?php

namespace App\Services;

use App\Models\Review;
use Exception;

class ReviewService
{
    public function index()
    {
        try {
            return Review::all();
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve reviews: " . $e->getMessage());
        }
    }

    public function show(int $id): Review
    {
        try {
            return Review::findOrFail($id);
        } catch (Exception $e) {
            throw new Exception("Review not found: " . $e->getMessage());
        }
    }
}
