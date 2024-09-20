<?php

namespace App\Providers;

use App\Contracts\GeocodingService as GeocodingServiceInterface;
use Illuminate\Support\ServiceProvider;
use Modules\Nominatim\GeocodingService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GeocodingServiceInterface::class, GeocodingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
