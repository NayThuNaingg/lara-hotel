<?php

use App\Http\Controllers\Amenity\AmenityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\Bed\BedController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\SpecialFeature\SpecialFeatureController;
use App\Http\Controllers\View\ViewController;
use App\Models\Bed;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin-backend')->group(function () {
    Route::get('login', [LoginController::class,'loginForm'])->name('loginForm');
    Route::post('postLogin', [LoginController::class,'postLogin'])->name('postLogin');
    Route::get('logout', [LoginController::class, 'getLogout'])->name('getLogout');
});

Route::group(['prefix' => 'admin-backend','middleware' => 'admin'], function () {
    Route::get('index', [IndexController::class, 'index'])->name('index');

    // view route
    Route::prefix('view')->group(function () {
        Route::get('edit/{id}', [ViewController::class,'editView']);
        Route::get('delete/{id}', [ViewController::class,'deleteView'])->name('deleteView');
        Route::post('updateView', [ViewController::class,'updateView'])->name('updateView');
        Route::get('formView', [ViewController::class, 'formView'])->name('formView');
        Route::post('postView', [ViewController::class, 'postView'])->name('postView');
        Route::get('listingView', [ViewController::class, 'listingView'])->name('listingView');
    });

    // bed route
    Route::prefix('bed')->group(function () {
        Route::get('edit/{id}', [BedController::class,'editBed']);
        Route::get('delete/{id}', [BedController::class,'deleteBed'])->name('deleteBed');
        Route::post('updateBed', [BedController::class,'updateBed'])->name('updateBed');
        Route::get('formBed', [BedController::class, 'formBed'])->name('formBed');
        Route::post('postBed', [BedController::class, 'postBed'])->name('postBed');
        Route::get('listingBed', [BedController::class, 'listingBed'])->name('listingBed');
    });

    // amenity route
    Route::prefix('amenity')->group(function () {
        Route::get('edit/{id}', [AmenityController::class,'editAmenity']);
        Route::get('delete/{id}', [AmenityController::class,'deleteAmenity'])->name('deleteAmenity');
        Route::post('updateAmenity', [AmenityController::class,'updateAmenity'])->name('updateAmenity');
        Route::get('formAmenity', [AmenityController::class, 'formAmenity'])->name('formAmenity');
        Route::post('postAmenity', [AmenityController::class, 'postAmenity'])->name('postAmenity');
        Route::get('listingAmenity', [AmenityController::class, 'listingAmenity'])->name('listingAmenity');

    });

    // specialFeature route
    Route::prefix('special-feature')->group(function () {
        Route::get('edit/{id}', [SpecialFeatureController::class,'editSpecialFeature']);
        Route::get('delete/{id}', [SpecialFeatureController::class,'specialFeatureDelete'])->name('deleteSpecialFeature');
        Route::post('updateSpecialFeature', [SpecialFeatureController::class,'updateSpecialFeature'])->name('updateSpecialFeature');
        Route::get('formSpecialFeature', [SpecialFeatureController::class, 'formSpecialFeature'])->name('formSpecialFeature');
        Route::post('postSpecialFeature', [SpecialFeatureController::class, 'postSpecialFeature'])->name('postSpecialFeature');
        Route::get('listingSpecialFeature', [SpecialFeatureController::class, 'listingSpecialFeature'])->name('listingSpecialFeature');

    });

    // ROOM Route
    Route::prefix('room')->group(function () {
        Route::get('edit/{id}', [RoomController::class,'editRoom']);
        Route::get('delete/{id}', [RoomController::class,'deleteRoom'])->name('deleteRoom');
        Route::post('updateRoom', [RoomController::class,'updateRoom'])->name('updateRoom');
        Route::get('formRoom', [RoomController::class, 'formRoom'])->name('formRoom');
        Route::post('postRoom', [RoomController::class, 'postRoom'])->name('postRoom');
        Route::get('listingRoom', [RoomController::class, 'listingRoom'])->name('listingRoom');

    });
});
