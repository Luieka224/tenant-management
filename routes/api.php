<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TestController;
use GuzzleHttp\Middleware;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response('Home', 200);
});

// Route::post('building', [BuildingController::class, 'create']);
// Route::get('building', [BuildingController::class, 'read']);
// Route::put('building/{id}', [BuildingController::class, 'update']);
// Route::delete('building/{id}', [BuildingController::class, 'delete']);



Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('building', BuildingController::class);
    Route::apiResource('floor', FloorController::class);
    Route::apiResource('room', RoomController::class);
});

Route::get('floor', [FloorController::class, 'index']);
Route::get('room', [RoomController::class, 'index']);
Route::get('building', [BuildingController::class, 'index']);

Route::apiResource('test', TestController::class);