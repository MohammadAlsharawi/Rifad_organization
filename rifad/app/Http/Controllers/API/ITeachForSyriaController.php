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
