<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ITechForSyriaRequests\storeRequest;
use App\Services\ITeachForSyriaService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ITeachForSyriaController extends Controller
{
    use ApiResponse;
    protected $ITechForSyria;
    public function __construct(ITeachForSyriaService $ITechForSyria)
    {
        $this->ITechForSyria = $ITechForSyria;
    }
    public function index()
    {
        try{
            $data = $this->ITechForSyria->getAll();
            return $this->successResponse($data, 'All I Teach records retrieved successfully.');
        }catch(\Exception $e){
            return $this->errorResponse($e->getMessage());
        }
    }
    public function show(int $id)
    {
        try{
            $response = $this->ITechForSyria->getById($id);
            if (!$response) {
            return $this->errorResponse('ITeach record not found');
            }
            return $this->successResponse($response, 'ITeach record retrieved successfully');
        }catch(\Exception $e){
            return $this->errorResponse($e->getMessage());
        }
    }
    public function store(storeRequest $request)
    {
        try{
            $response = $this->ITechForSyria->create($request->validated());
            return $this->successResponse($response, 'Form submitted successfully.');
        }catch(\Exception $e){
            return $this->errorResponse($e->getMessage());
        }
    }
    public function formData()
    {
        try{
            $data = $this->ITechForSyria->getFormData();
            return $this->successResponse($data, 'Form data loaded successfully');
        }catch(\Exception $e){
            return $this->errorResponse($e->getMessage());
        }

    }
}
