<?php

namespace App\Providers;

use App\Contracts\CityContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CityRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        CityContract::class         =>          CityRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
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
