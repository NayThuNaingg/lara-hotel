<?php

namespace App\Providers;
<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
use App\Repository\View\ViewRepositoryInterface;
use App\Repository\View\ViewRepository;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Bed\BedRepository;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\Amenity\AmenityRepository;
use App\Repository\Feature\FeatureRepositoryInterface;
use App\Repository\Feature\FeatureRepository;
use App\Repository\Reservation\ReservationRepository;
use App\Repository\Reservation\ReservationRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\Room\RoomRepository;
use App\Repository\roomGallery\roomGalleryRepositoryInterface;
use App\Repository\roomGallery\roomGalleryRepository;
use App\Repository\Setting\SettingRepositoryInterface;
use App\Repository\Setting\SettingRepository;

=======

use App\Models\Bed;
use App\Repository\View\ViewRepository;
use App\Repository\Bed\BedRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;
>>>>>>> 2c61e9d1453a61269cbb2ec27ea7004e2e183eeb

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
<<<<<<< HEAD
        $this->app->bind(ViewRepositoryInterface::class,ViewRepository::class);
        // $this->app->bind(BedRepositoryInterface::class,BedRepository::class);
        // $this->app->bind(AmenityRepositoryInterface::class,AmenityRepository::class);
        // $this->app->bind(FeatureRepositoryInterface::class,FeatureRepository::class);
        // $this->app->bind(RoomRepositoryInterface::class,RoomRepository::class);
        // $this->app->bind(roomGalleryRepositoryInterface::class,roomGalleryRepository::class);
        // $this->app->bind(ReservationRepositoryInterface::class,ReservationRepository::class);
        // $this->app->bind(SettingRepositoryInterface::class,SettingRepository::class);

=======
        $this->app->bind(ViewRepositoryInterface::class, ViewRepository::class);
        $this->app->bind(BedRepositoryInterface::class, BedRepository::class);
>>>>>>> 2c61e9d1453a61269cbb2ec27ea7004e2e183eeb
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
