<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInfoController;
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

Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('building', BuildingController::class);
    Route::apiResource('floor', FloorController::class);
    Route::apiResource('room', RoomController::class);
    Route::apiResource('user-info', UserInfoController::class);

    Route::get('user', [UserController::class, 'index']);
    Route::get('my-rooms', [UserController::class, 'getMyRooms']);
    
    Route::post('get-room', [RoomController::class, 'getRoom']);
});

Route::get('floor', [FloorController::class, 'index']);
Route::get('room', [RoomController::class, 'index']);
Route::get('building', [BuildingController::class, 'index']);

Route::apiResource('test', TestController::class);