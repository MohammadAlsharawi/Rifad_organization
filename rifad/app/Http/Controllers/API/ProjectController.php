<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ProjectService;
use App\Traits\ApiResponse;
use Exception;

class ProjectController extends Controller
{
    use ApiResponse;

    protected  $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $projects = $this->service->index();
            return $this->successResponse($projects, 'All projects retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function show(int $id)
    {
        try {
            $project = $this->service->show($id);
            return $this->successResponse($project, 'Project retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }
    public function campaigns()
    {
        try {
            $projects = ProjectService::campaigns();
            return $this->successResponse($projects, 'In-progress campaign projects retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function initiatives()
    {
        try {
            $projects = ProjectService::initiatives();
            return $this->successResponse($projects, 'In-progress initiative projects retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
