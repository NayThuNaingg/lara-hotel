<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\View\ViewRepositoryInterface;
use App\Repository\View\ViewRepository;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Bed\BedRepository;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\Amenity\AmenityRepository;
use App\Repository\SpecialFeature\SpecialFeatureRepositoryInterface;
use App\Repository\SpecialFeature\SpecialFeatureRepository;
use App\Repository\Reservation\ReservationRepository;
use App\Repository\Reservation\ReservationRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\Room\RoomRepository;
use App\Repository\roomGallery\roomGalleryRepositoryInterface;
use App\Repository\roomGallery\roomGalleryRepository;
use App\Repository\Setting\SettingRepositoryInterface;
use App\Repository\Setting\SettingRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(BedRepositoryInterface::class,BedRepository::class);
        $this->app->bind(AmenityRepositoryInterface::class, AmenityRepository::class);
        $this->app->bind(SpecialFeatureRepositoryInterface::class, SpecialFeatureRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        // $this->app->bind(roomGalleryRepositoryInterface::class,roomGalleryRepository::class);
        // $this->app->bind(ReservationRepositoryInterface::class,ReservationRepository::class);
        // $this->app->bind(SettingRepositoryInterface::class,SettingRepository::class);

        $this->app->bind(ViewRepositoryInterface::class, ViewRepository::class);
        $this->app->bind(BedRepositoryInterface::class, BedRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
