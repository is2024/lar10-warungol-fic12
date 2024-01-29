<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UjianController;


//--API
//-----------------------------------------------------------------
// Route::post('/register', \App\Http\Controllers\Api\Auth\RegisterController::class);

//--register:
Route::post('/register', [AuthController::class, 'register']);
//--login:
Route::post('/login', [AuthController::class, 'login']);
//--logout:
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//-----------------------------------------------------------------
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//--CATEGORY
//-----------------------------------------------------------------
Route::apiResource('category_api', \App\Http\Controllers\Api\CategoryController::class);//->middleware('auth:sanctum');

//--PRODUCT
//-----------------------------------------------------------------
// Route::apiResource('product', \App\Http\Controllers\Api\ProductController::class);//->middleware('auth:sanctum');
Route::get('product', [App\Http\Controllers\Api\ProductController::class, 'index']);//->middleware('auth:sanctum');

//--ADDRESS
//-----------------------------------------------------------------
Route::get('address-by-user', [App\Http\Controllers\Api\AddressController::class, 'addressByUser'])->middleware('auth:sanctum');
Route::apiResource('address', \App\Http\Controllers\Api\AddressController::class)->middleware('auth:sanctum');
// Route::get('address', [App\Http\Controllers\Api\AddressController::class, 'index']);//->middleware('auth:sanctum');

//--UJIAN : Create
//-----------------------------------------------------------------
Route::post('/create-ujian', [UjianController::class, 'create'])->middleware('auth:sanctum');
Route::post('/create-exam-by-category', [UjianController::class, 'createExamByCategory'])->middleware('auth:sanctum');
Route::get('/get-exam-question-by-category', [UjianController::class, 'getExamQuestionByKategori'])->middleware('auth:sanctum');
Route::get('/get-soal-ujian', [UjianController::class, 'getSoalUjianByKategori'])->middleware('auth:sanctum');
Route::post('/jawab-soal-ujian', [UjianController::class, 'jawabSoalUjian'])->middleware('auth:sanctum');
Route::get('/get-exam-result-by-category', [UjianController::class, 'getExamResultByKategori'])->middleware('auth:sanctum');
Route::get('/get-exam-result', [UjianController::class, 'getExamResult'])->middleware('auth:sanctum');