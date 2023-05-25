<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\RoomController;

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

// Route::get("/room/index", [RoomController::class, "testApi"]);
// Route::post("/room/index", [RoomController::class, "testApi"]);

Route::post("/room/detail", [RoomController::class, "apiDetail"]);

// Route::post("/rooms", [RoomController::class, "apiRoom"]);

// Route::post("/room/RoomSpecialFeatures", [RoomController::class, "apiRoomSpecialFeature"]);

// Route::post("/room/RoomSpecialFeature", [RoomController::class, "apiRoomSpecialFeatureByName"]);
