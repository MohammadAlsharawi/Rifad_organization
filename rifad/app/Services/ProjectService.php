<?php

namespace App\Services;

use App\Models\Project;
use Exception;

class ProjectService
{
    public function index()
    {
        try {
            $projects = Project::where('status', 'in_progress')->get();

            return $projects->map(function ($project) {
                return [
                    'id'               => $project->id,
                    'image'            => $project->image,
                    'title'            => $project->getTranslation('title', app()->getLocale()),
                    'description'      => $project->getTranslation('description', app()->getLocale()),
                    'reason'           => $project->getTranslation('reason', app()->getLocale()),
                    'total_amount'     => $project->total_amount,
                    'secured_amount'   => $project->secured_amount,
                    'secured_percentage'=> $this->calculatePercentage($project->secured_amount, $project->total_amount),
                    'organization_id'  => $project->organization_id,
                    'status'            => __($project->status),
                    'category'          => __($project->category),
                    'created_at'       => $project->created_at,
                    'updated_at'       => $project->updated_at,
                ];
            });
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve projects: " . $e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $project = Project::where('status', 'in_progress')->findOrFail($id);

            return [
                'id'               => $project->id,
                'image'            => $project->image,
                'title'            => $project->getTranslation('title', app()->getLocale()),
                'description'      => $project->getTranslation('description', app()->getLocale()),
                'reason'           => $project->getTranslation('reason', app()->getLocale()),
                'total_amount'     => $project->total_amount,
                'secured_amount'   => $project->secured_amount,
                'secured_percentage'=> $this->calculatePercentage($project->secured_amount, $project->total_amount),
                'organization_id'  => $project->organization_id,
                'status'            => __($project->status),
                'category'          => __($project->category),
                'created_at'       => $project->created_at,
                'updated_at'       => $project->updated_at,
            ];
        } catch (Exception $e) {
            throw new Exception("Project not found or not in progress: " . $e->getMessage());
        }
    }

    public static function campaigns()
    {
        try {
            $projects = Project::where('category', 'campaigns')
                ->where('status', 'in_progress')
                ->get();

            return $projects->map(function ($project) {
                return [
                    'id'               => $project->id,
                    'image'            => $project->image,
                    'title'            => $project->getTranslation('title', app()->getLocale()),
                    'description'      => $project->getTranslation('description', app()->getLocale()),
                    'reason'           => $project->getTranslation('reason', app()->getLocale()),
                    'total_amount'     => $project->total_amount,
                    'secured_amount'   => $project->secured_amount,
                    'secured_percentage'=> self::calculatePercentage($project->secured_amount, $project->total_amount),
                    'organization_id'  => $project->organization_id,
                    'status'            => __($project->status),
                    'category'          => __($project->category),
                    'created_at'       => $project->created_at,
                    'updated_at'       => $project->updated_at,
                ];
            });
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve in-progress campaigns: " . $e->getMessage());
        }
    }

    public static function initiatives()
    {
        try {
            $projects = Project::where('category', 'initiative')
                ->where('status', 'in_progress')
                ->get();

            return $projects->map(function ($project) {
                return [
                    'id'               => $project->id,
                    'image'            => $project->image,
                    'title'            => $project->getTranslation('title', app()->getLocale()),
                    'description'      => $project->getTranslation('description', app()->getLocale()),
                    'reason'           => $project->getTranslation('reason', app()->getLocale()),
                    'total_amount'     => $project->total_amount,
                    'secured_amount'   => $project->secured_amount,
                    'secured_percentage'=> self::calculatePercentage($project->secured_amount, $project->total_amount),
                    'organization_id'  => $project->organization_id,
                    'status'            => __($project->status),
                    'category'          => __($project->category),
                    'created_at'       => $project->created_at,
                    'updated_at'       => $project->updated_at,
                ];
            });
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve in-progress initiatives: " . $e->getMessage());
        }
    }

    private static function calculatePercentage($secured, $total): float
    {
        $secured = (float) $secured;
        $total   = (float) $total;
        if ($total == 0 || $total === null) {
            return 0;
        }
        return round(($secured / $total) * 100, 2);
    }
}
