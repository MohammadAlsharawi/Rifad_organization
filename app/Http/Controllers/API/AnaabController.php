<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnaabRequest\storeRequest;
use App\Services\AnaabService;
use App\Traits\ApiResponse;
use Exception;

class AnaabController extends Controller
{
    use ApiResponse;

    protected AnaabService $service;

    public function __construct(AnaabService $service)
    {
        $this->service = $service;
    }

    public function store(storeRequest $request)
    {
        try {
            $anaab = $this->service->store($request->validated());
            return $this->successResponse($anaab, 'Anaab created successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function residences()
    {
        try {
            $residences = $this->service->getResidences();
            return $this->successResponse($residences, 'Residences retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
