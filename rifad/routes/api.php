<?php

use App\Http\Controllers\API\AnaabController;
use App\Http\Controllers\API\ITeachForSyriaController;
use App\Http\Controllers\API\LabibController;
use App\Http\Controllers\API\OnlineArabicPathController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/I-Teach', [ITeachForSyriaController::class, 'index']);
Route::get('/I-Teach/{id}', [ITeachForSyriaController::class, 'show']);
Route::get('/I-Teach-form-data', [ITeachForSyriaController::class, 'formData']);
Route::post('/I-Teach-for-syria', [ITeachForSyriaController::class, 'store']);


Route::post('/anaabs', [AnaabController::class, 'store']);
Route::get('/anaabs-form-data', [AnaabController::class, 'residences']);
Route::get('/anaabs', [AnaabController::class, 'index']);
Route::get('/anaabs/{id}', [AnaabController::class, 'show']);

Route::post('/online-arabic-path', [OnlineArabicPathController::class, 'store']);
Route::get('/online-arabic-path/fk-data', [OnlineArabicPathController::class, 'fkData']);
Route::get('/online-arabic-path', [OnlineArabicPathController::class, 'index']);
Route::get('/online-arabic-path/{id}', [OnlineArabicPathController::class, 'show']);

Route::post('/labibs', [LabibController::class, 'store']);
Route::get('/labibs', [LabibController::class, 'index']);
Route::get('/labibs/{id}', [LabibController::class, 'show']);
