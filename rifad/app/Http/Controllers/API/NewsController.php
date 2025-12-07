<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use App\Traits\ApiResponse;
use Exception;

class NewsController extends Controller
{
    use ApiResponse;

    protected NewsService $service;

    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $news = $this->service->index();
            return $this->successResponse($news, 'All news retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function show(int $id)
    {
        try {
            $news = $this->service->show($id);
            return $this->successResponse($news, 'News retrieved successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }
}
