<?php

use App\Models\Bed;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Bed\BedController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\View\ViewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Index\frontendController;
use App\Http\Controllers\Amenity\AmenityController;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\HotelSetting\HotelSettingController;
use App\Http\Controllers\SpecialFeature\SpecialFeatureController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [frontendController::class, 'index'])->name('indexForm');
Route::prefix('rooms')->group(function () {
    Route::get('/', [frontendController::class,'rooms'])->name('rooms');
    Route::get('/detail/{id}', [frontendController::class, 'detailRooms']);
    Route::get('/reserve/{id}', [frontendController::class,'roomReserve']);
    Route::post('/reserved', [frontendController::class,'postRoomReserved'])->name('postRoomReserved');

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

    // ROOM AND ROOM-GALLERY Route
    Route::prefix('room')->group(function () {
        // Room route
        Route::get('edit/{id}', [RoomController::class,'editRoom']);
        Route::get('detail/{id}', [RoomController::class, 'detailRoom']);
        Route::get('delete/{id}', [RoomController::class,'deleteRoom'])->name('deleteRoom');
        Route::post('updateRoom', [RoomController::class,'updateRoom'])->name('updateRoom');
        Route::get('formRoom', [RoomController::class, 'formRoom'])->name('formRoom');
        Route::post('postRoom', [RoomController::class, 'postRoom'])->name('postRoom');
        Route::get('listingRoom', [RoomController::class, 'listingRoom'])->name('listingRoom');

        // Room Gallery
        Route::prefix('room-gallery')->group(function () {
            Route::get('/{id}', [RoomController::class,'formRoomGallery'])->name('formRoomGallery');
            Route::get('/delete/{id}', [RoomController::class,'deleteRoomGallery']);
            Route::get('/edit/{id}', [RoomController::class,'editRoomGallery']);
            Route::post('/update', [RoomController::class,'updateRoomGallery'])->name('updateRoomGallery');
            Route::post('/create', [RoomController::class,'postRoomGallery'])->name('postRoomGallery');
        });

    });

    Route::prefix('reservation')->group(function () {
        Route::get('listing', [ReservationController::class,'ReservationListing'])->name('ReservationListing');
        Route::get('confirm/{id}', [ReservationController::class,'ReservationConfrim']);
        Route::get('delete/{id}', [ReservationController::class,'delete']);
    });

    Route::prefix('lara-hotel-setting')->group(function () {
        Route::get('edit/', [HotelSettingController::class,'editHotelSetting'])->name('hotelSetting');
        Route::post('updateHotelSetting', [HotelSettingController::class,'updateHotelSetting'])->name('updateHotelSetting');
    });
});
