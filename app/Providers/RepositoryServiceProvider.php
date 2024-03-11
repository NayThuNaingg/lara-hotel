<?php

namespace App\Providers;

use App\Repository\View\ViewRepository;
use App\Repository\View\ViewRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ViewRepositoryInterface::class, ViewRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
