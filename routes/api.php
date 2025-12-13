<?php

use App\Http\Controllers\API\AnaabController;
use App\Http\Controllers\API\DonorController;
use App\Http\Controllers\API\ITeachForSyriaController;
use App\Http\Controllers\API\JoinUsController;
use App\Http\Controllers\API\LabibController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\OnlineArabicPathController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\VolunteeringController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/I-Teach-form-data', [ITeachForSyriaController::class, 'formData']);
Route::post('/I-Teach-for-syria', [ITeachForSyriaController::class, 'store']);


Route::post('/anaabs', [AnaabController::class, 'store']);
Route::get('/anaabs-form-data', [AnaabController::class, 'residences']);

Route::post('/online-arabic-path', [OnlineArabicPathController::class, 'store']);
Route::get('/online-arabic-path/fk-data', [OnlineArabicPathController::class, 'fkData']);

Route::post('/labibs', [LabibController::class, 'store']);

Route::post('/volunteerings', [VolunteeringController::class, 'store']);
Route::get('/volunteerings/fk-data', [VolunteeringController::class, 'fkData']);

Route::post('/join-us', [JoinUsController::class, 'store']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{id}', [ReviewController::class, 'show']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('/projects-campaigns', [ProjectController::class, 'campaigns']);
Route::get('/projects-initiatives', [ProjectController::class, 'initiatives']);


Route::prefix('donors')->group(function () {
    Route::post('/', [DonorController::class, 'store']);
    Route::get('/projects', [DonorController::class, 'projects']);
    Route::post('/{id}/approve', [DonorController::class, 'approve']); 
});
