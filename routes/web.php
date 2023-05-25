<?php

use App\Http\Controllers\Amenities\AmenitiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Bed\BedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\SpecialFeature\SpecialFeatureController;
use App\Http\Controllers\View\ViewController;
use App\Http\Controllers\Home\FrontendController;

    // Front END * //
Route::get("/", [FrontendController::class,'index']);
Route::get("/rooms", [FrontendController::class,'getAllRoom']);
Route::get("/about", [FrontendController::class,'about']);
Route::get("/contact", [FrontendController::class,'contact']);
Route::get("/room/detail/{id}", [FrontendController::class,'detail']);

/** Login */
Route::get("/backend/login", [AuthController::class, "getLoginPage"]);
Route::post("/backend/login", [AuthController::class, "postLoginPage"])->name("auth.login");
Route::get("/backend/logout", [AuthController::class, "getLogout"]);

Route::group(['prefix' => 'backend', 'middleware' => ['administrator:Admin']], function()
    {

        Route::get("/index", [HomeController::class, "index"]);

        Route::prefix('view')->group(function()
        {
            Route::get('/index', [ViewController::class, 'getRoomView'])->name('viewListing');
            Route::get("/create", [ViewController::class, "create"])->name('viewCreate');
            Route::post("/store", [ViewController::class, "store"])->name('viewStore');
            Route::post('/update', [ViewController::class, 'update'])->name('viewUpdate');
            Route::get('/edit/{id}', [ViewController::class, 'edit']);
            // Route::get("/create", [HomeController::class, "createView"])->name("viewCreate");
            // Route::post("/store", [HomeController::class, "store"]);
            // Route::get("/edit/{id}", [HomeController::class, "editView"]);
            // Route::post("/update", [HomeController::class, "update"]);
            // Route::get("/delete/{id}", [HomeController::class, "deleteView"]);
        });

        Route::prefix('bed')->group(function()
        {
            Route::get('/index', [BedController::class, 'index'])->name('bedListing');
            Route::get("/create", [BedController::class, "create"])->name('bedCreate');
            Route::post("/store", [BedController::class, "store"])->name('bedStore');
            Route::get('/edit/{id}', [BedController::class, 'edit']);
            Route::post('/update', [BedController::class, 'update'])->name('bedUpdate');
        });

        Route::prefix('room')->group(function()
        {
            Route::get('/index', [RoomController::class, 'index'])->name('roomListing');
            Route::get('/create', [RoomController::class, 'create'])->name('roomCreate');
            Route::post('/store', [RoomController::class, 'store'])->name('roomStore');
            Route::get('/image/manage/{id}', [RoomController::class, 'createImage'])->name('roomImageCreate');
            Route::post('/image/store', [RoomController::class,'storeImage']);
            Route::get('/image/edit/{rid}/gallery/{id}/thumb/{thumb}', [RoomController::class,'editImage']);
            Route::post('/image/update', [RoomController::class,'updateImage']);
        });

        Route::prefix('special-feature')->group(function()
        {
            Route::get('/index', [SpecialFeatureController::class, 'index'])->name('specialFeatureListing');
            Route::get("/create", [SpecialFeatureController::class, "create"])->name('specialFeatureCreate');
            Route::post("/store", [SpecialFeatureController::class, "store"])->name("specialFeatureStore");
            Route::get('/edit/{id}', [SpecialFeatureController::class, 'edit']);
            Route::post('/update', [SpecialFeatureController::class, 'update'])->name('specialFeatureUpdate');
        });

        Route::prefix('amenities')->group(function()
        {
            Route::get('/create', [AmenitiesController::class, 'create'])->name('amenitiesCreate');
            Route::post('/store', [AmenitiesController::class, 'store'])->name('amenitiesStore');
        });
    });
