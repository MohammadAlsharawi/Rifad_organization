<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OnlineArabicPathRequest\storeRequest;
use App\Http\Requests\StudentRequest;
use App\Services\OnlineArabicPathService;
use App\Services\StudentService;
use App\Traits\ApiResponse;
use Exception;

class OnlineArabicPathController extends Controller
{
    use ApiResponse;

    protected OnlineArabicPathService $service;

    public function __construct(OnlineArabicPathService $service)
    {
        $this->service = $service;
    }

    public function store(storeRequest $request)
    {
        try {
            $student = $this->service->store($request->validated());
            return $this->successResponse($student, 'Student created successfully');
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
