<?php

namespace App\Providers;

use App\Models\Bed;
use App\Repository\View\ViewRepository;
use App\Repository\Bed\BedRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
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
