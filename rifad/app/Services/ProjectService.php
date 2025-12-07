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
                $project->secured_percentage = $this->calculatePercentage($project->secured_amount, $project->total_amount);
                return $project;
            });
        } catch (Exception $e) {
            throw new Exception("Failed to retrieve projects: " . $e->getMessage());
        }
    }

    public function show(int $id): Project
    {
        try {
            $project = Project::where('status', 'in_progress')->findOrFail($id);
            $project->secured_percentage = $this->calculatePercentage($project->secured_amount, $project->total_amount);
            return $project;
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
                $project->secured_percentage = self::calculatePercentage($project->secured_amount, $project->total_amount);
                return $project;
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
                $project->secured_percentage = self::calculatePercentage($project->secured_amount, $project->total_amount);
                return $project;
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
