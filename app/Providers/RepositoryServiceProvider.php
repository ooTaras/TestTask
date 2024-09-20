<?php

namespace App\Providers;

use App\Repositories\Implementation\EloquentJobLogRepository;
use App\Repositories\Implementation\EloquentPlaceRepository;
use App\Repositories\JobLogRepository;
use App\Repositories\PlaceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PlaceRepository::class, EloquentPlaceRepository::class);
        $this->app->bind(JobLogRepository::class, EloquentJobLogRepository::class);
    }
}
