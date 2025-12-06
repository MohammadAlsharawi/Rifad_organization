<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabibRequest;
use App\Http\Requests\LabibRequest\storeRequest;
use App\Services\LabibService;
use App\Traits\ApiResponse;
use Exception;

class LabibController extends Controller
{
    use ApiResponse;

    protected LabibService $service;

    public function __construct(LabibService $service)
    {
        $this->service = $service;
    }

    public function store(storeRequest $request)
    {
        try {
            $labib = $this->service->store($request->validated());
            return $this->successResponse($labib, 'Labib created successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function index()
    {
        try {
            $labibs = $this->service->index();
            return $this->successResponse($labibs, 'All Labibs retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function show(int $id)
    {
        try {
            $labib = $this->service->show($id);
            return $this->successResponse($labib, 'Labib retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }
}
