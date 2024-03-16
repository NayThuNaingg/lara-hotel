<?php

use App\Http\Controllers\Amenity\AmenityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\Bed\BedController;
use App\Http\Controllers\Home\IndexController;
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

    // view form
    Route::prefix('view')->group(function () {
        Route::get('edit/{id}', [ViewController::class,'viewEdit']);
        Route::get('delete/{id}', [ViewController::class,'viewDelete'])->name('viewDelete');
        Route::post('viewUpdate', [ViewController::class,'viewUpdate'])->name('viewUpdate');
        Route::get('viewForm', [ViewController::class, 'viewForm'])->name('viewForm');
        Route::post('postView', [ViewController::class, 'postView'])->name('postView');
        Route::get('viewListing', [ViewController::class, 'viewListing'])->name('viewListing');
    });

    // bed form
    Route::prefix('bed')->group(function () {
        Route::get('edit/{id}', [BedController::class,'bedEdit']);
        Route::get('delete/{id}', [BedController::class,'bedDelete'])->name('bedDelete');
        Route::post('viewUpdate', [BedController::class,'bedUpdate'])->name('bedUpdate');
        Route::get('bedForm', [BedController::class, 'bedForm'])->name('bedForm');
        Route::post('postBed', [BedController::class, 'postBed'])->name('postBed');
        Route::get('Bedlisting', [BedController::class, 'bedListing'])->name('bedListing');
    });

    // amenity form
    Route::prefix('amenity')->group(function () {
        Route::get('amenityForm', [AmenityController::class, 'amenityForm'])->name('amenityForm');
        Route::post('postAmenity', [AmenityController::class, 'postAmenity'])->name('postAmenity');
    });

    // specialFeature Form
    Route::prefix('special-feature')->group(function () {
        Route::get('edit/{id}', [SpecialFeatureController::class,'editSpecialFeature']);
        Route::get('delete/{id}', [SpecialFeatureController::class,'specialFeatureDelete'])->name('deleteSpecialFeature');
        Route::post('updateSpecialFeature', [SpecialFeatureController::class,'updateSpecialFeature'])->name('updateSpecialFeature');
        Route::get('formSpecialFeature', [SpecialFeatureController::class, 'formSpecialFeature'])->name('formSpecialFeature');
        Route::post('postSpecialFeature', [SpecialFeatureController::class, 'postSpecialFeature'])->name('postSpecialFeature');
        Route::get('listingSpecialFeature', [SpecialFeatureController::class, 'listingSpecialFeature'])->name('listingSpecialFeature');

    });
});
