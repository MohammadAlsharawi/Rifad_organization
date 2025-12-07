<?php

namespace App\Services;

use App\Models\LastestUpdate;

use Exception;

class NewsService
{
    public function index()
    {
        try {
            return LastestUpdate::all();
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve news: " . $e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            return LastestUpdate::findOrFail($id);
        } catch (Exception $e) {
            throw new Exception("News not found: " . $e->getMessage());
        }
    }
}
