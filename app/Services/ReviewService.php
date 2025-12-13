<?php

namespace App\Services;

use App\Models\Review;
use Exception;

class ReviewService
{
    public function index()
    {
        try {
            return Review::all()->map(function ($review) {
                return [
                    'id'        => $review->id,
                    'name'      => $review->getTranslation('name', app()->getLocale()),
                    'review'    => $review->getTranslation('review', app()->getLocale()),
                    'created_at'=> $review->created_at,
                    'updated_at'=> $review->updated_at,
                ];
            });
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve reviews: " . $e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $review = Review::findOrFail($id);

            return [
                'id'        => $review->id,
                'name'      => $review->getTranslation('name', app()->getLocale()),
                'review'    => $review->getTranslation('review', app()->getLocale()),
                'created_at'=> $review->created_at,
                'updated_at'=> $review->updated_at,
            ];
        } catch (Exception $e) {
            throw new Exception("Review not found: " . $e->getMessage());
        }
    }

}
