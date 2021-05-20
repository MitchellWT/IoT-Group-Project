<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorSystemController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\APIDataController;

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

Route::middleware('auth:api')->post('/sensorsystem/store', [SensorSystemController::class, 'store']);

Route::middleware('auth:api')->post('/sensorsystem/update', [SensorSystemController::class, 'update']);

Route::middleware('auth:api')->post('/sensordata/store', [SensorDataController::class, 'store']);

Route::middleware('auth:api')->post('/apidata/store', [APIDataController::class, 'store']);

Route::middleware('auth:api')->post('/apidata/update', [APIDataController::class, 'update']);
