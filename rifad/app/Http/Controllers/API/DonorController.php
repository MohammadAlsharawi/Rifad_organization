<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\DonorRequest;
use App\Http\Requests\DonorRequest\storeRequest;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Services\DonorService;
use App\Traits\ApiResponse;


class DonorController extends Controller
{
    use ApiResponse;

    protected DonorService $donorService;

    public function __construct(DonorService $donorService)
    {
        $this->donorService = $donorService;
    }

    public function store(storeRequest $request)
    {
        try {
            $donor = $this->donorService->createDonor($request->validated());
            return $this->successResponse($donor, 'Donor created successfully');
        } catch (\Throwable $e) {
            return $this->errorResponse('Failed to create donor'. $e->getMessage());
        }
    }
    public function approve($id)
    {
        try {
            $donor = Donor::findOrFail($id);
            $donor = $this->donorService->approveDonor($donor);
            return $this->successResponse($donor, 'Donation approved successfully');
        } catch (\Throwable $e) {
            return $this->errorResponse('Failed to approve donation'. $e->getMessage());
        }
    }
    public function projects()
    {
        try {
            $projects = $this->donorService->getProjects();
            return $this->successResponse($projects, 'Projects retrieved successfully');
        } catch (\Throwable $e) {
            return $this->errorResponse('Failed to retrieve projects'. $e->getMessage(), 500);
        }
    }
}
