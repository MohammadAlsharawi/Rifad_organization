<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\JoinUsRequest;
use App\Http\Requests\JoinUsRequest\storeRequest;
use App\Services\JoinUsService;
use App\Traits\ApiResponse;
use Exception;

class JoinUsController extends Controller
{
    use ApiResponse;

    protected JoinUsService $service;

    public function __construct(JoinUsService $service)
    {
        $this->service = $service;
    }

    public function store(storeRequest $request)
    {
        try {
            $joinUs = $this->service->store($request->validated());
            return $this->successResponse($joinUs, 'JoinUs record created successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
