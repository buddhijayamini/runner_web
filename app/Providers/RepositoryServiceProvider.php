<?php

namespace App\Providers;

use App\Interfaces\MeetingRepositoryInterface;
use App\Interfaces\RaceRepositoryInterface;
use App\Interfaces\RunnerRepositoryInterface;
use App\Repositories\MeetingRepository;
use App\Repositories\RaceRepository;
use App\Repositories\RunnerRepository;
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
        $this->app->bind(MeetingRepositoryInterface::class, MeetingRepository::class);
        $this->app->bind(RaceRepositoryInterface::class, RaceRepository::class);
        $this->app->bind(RunnerRepositoryInterface::class, RunnerRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
