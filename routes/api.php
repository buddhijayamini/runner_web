<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\TbmMeetingController;
use App\Http\Controllers\Api\V1\TbmRaceController;
use App\Http\Controllers\Api\V1\TbmRunnerController;
use App\Http\Controllers\Api\V1\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/test', function (Request $request) {
    return 'Authenticated!';
});

Route::group([
    'middleware' => 'cors',
    'prefix' => 'v1/auth'
], function ($router) {
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::group([
    'middleware' => 'cors',
    'prefix' => 'v1'
], function ($router) {
    //Route::middleware('auth:api')->get('/meetings',[TbmMeetingController::class,'index']);
    //Route::get('/meetings',[TbmMeetingController::class,'index'])->middleware('auth:api');
    Route::get('/meetings',[TbmMeetingController::class,'index']);
    Route::get('/meetings/{id}', [TbmMeetingController::class, 'show']);
    Route::post('/meetings', [TbmMeetingController::class, 'store']);
    Route::put('/meetings/{id}', [TbmMeetingController::class, 'update']);
    Route::delete('/meetings/{id}', [TbmMeetingController::class, 'destroy']);

    Route::get('/races',[TbmRaceController::class,'index']);
    Route::get('/races/{id}', [TbmRaceController::class, 'show']);
    Route::post('/races', [TbmRaceController::class, 'store']);
    Route::put('/races/{id}', [TbmRaceController::class, 'update']);
    Route::delete('/races/{id}', [TbmRaceController::class, 'destroy']);

    Route::get('/runner',[TbmRunnerController::class,'index']);
    Route::get('/runner/{id}', [TbmRunnerController::class, 'show']);
    Route::post('/runner', [TbmRunnerController::class, 'store']);
    Route::put('/runner/{id}', [TbmRunnerController::class, 'update']);
    Route::delete('/runner/{id}', [TbmRunnerController::class, 'destroy']);
    Route::get('/runner/{runnerId}/form-data', [TbmRunnerController::class, 'showFormData']);
});

Route::fallback(function(){
    return response()->json(['message' => 'Resource not found.'], 404);
});
