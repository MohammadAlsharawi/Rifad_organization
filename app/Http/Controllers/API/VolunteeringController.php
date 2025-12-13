<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteeringRequest;
use App\Http\Requests\VolunteeringRequest\storeRequest;
use App\Services\VolunteeringService;
use App\Traits\ApiResponse;
use Exception;

class VolunteeringController extends Controller
{
    use ApiResponse;

    protected VolunteeringService $service;

    public function __construct(VolunteeringService $service)
    {
        $this->service = $service;
    }

    public function store(storeRequest $request)
    {
        try {
            $volunteer = $this->service->store($request->validated());
            return $this->successResponse($volunteer, 'Volunteering created successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function fkData()
    {
        try {
            $data = $this->service->getAllFkData();
            return $this->successResponse($data, 'All FK data retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
