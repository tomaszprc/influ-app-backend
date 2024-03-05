<?php

use App\Http\Controllers\Api\V1\AnnoucementController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* 
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/v1/companies', [CompanyController::class, 'index']);
Route::get('/v1/companies/{company}', [CompanyController::class, 'show']);
Route::post('/v1/companies', [CompanyController::class, 'store']);

Route::get('/v1/annoucements', [AnnoucementController::class, 'index']);
Route::get('/v1/annoucements/{annoucement}', [AnnoucementController::class, 'show']);

Route::get('/v1/blog', [BlogController::class, 'index']);
Route::get('/v1/blog/{post}', [BlogController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 