<?php

namespace App\Services;

use App\Models\LastestUpdate;

use Exception;
use Illuminate\Support\Facades\Storage;

class NewsService
{
    public function index()
    {
        try {
            return LastestUpdate::all()->map(function ($update) {
                return [
                    'id'          => $update->id,
                    'title'       => $update->getTranslation('title', app()->getLocale()),
                    'description' => $update->getTranslation('description', app()->getLocale()),
                    'photo'       => Storage::disk('public')->url($update->photo),
                    'date'        => $update->date,
                    'time'        => $update->time,
                    'created_at'  => $update->created_at,
                    'updated_at'  => $update->updated_at,
                ];
            });
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve news: " . $e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $update = LastestUpdate::findOrFail($id);

            return [
                'id'          => $update->id,
                'title'       => $update->getTranslation('title', app()->getLocale()),
                'description' => $update->getTranslation('description', app()->getLocale()),
                'photo'       => Storage::disk('public')->url($update->photo),
                'date'        => $update->date,
                'time'        => $update->time,
                'created_at'  => $update->created_at,
                'updated_at'  => $update->updated_at,
            ];
        } catch (Exception $e) {
            throw new Exception("News not found: " . $e->getMessage());
        }
    }

}
