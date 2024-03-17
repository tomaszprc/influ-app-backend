<?php


use App\Http\Controllers\Api\V1\AnnoucementController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\InfluencerController;
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

Route::middleware('auth:sanctum')->get('/v1/user', function (Request $request) {
    return $request->user();
});
 

Route::post('/v1/influencer/register', [InfluencerController::class, 'register']);

Route::get('/v1/companies', [CompanyController::class, 'index']);
Route::get('/v1/companies/{company}', [CompanyController::class, 'show']);
Route::post('/v1/companies', [CompanyController::class, 'store']);
Route::post('/v1/company/register', [CompanyController::class, 'register']);

Route::get('/v1/annoucements', [AnnoucementController::class, 'index']);
Route::post('/v1/annoucements', [AnnoucementController::class, 'store'])->middleware('auth:sanctum');
Route::get('/v1/annoucements/{annoucement}', [AnnoucementController::class, 'show']);

Route::get('/v1/blog', [BlogController::class, 'index']);
Route::get('/v1/blog/{post}', [BlogController::class, 'show']);
Route::post('/v1/blog', [BlogController::class, 'store']);

Route::post('/v1/login', [AuthController::class, 'login']);
Route::post('/v1/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
