<?php

namespace App\Providers;

use App\Contracts\CityContract;
use App\Contracts\UomContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CityRepository;
use App\Repositories\UomRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        CityContract::class => CityRepository::class,
        UomContract::class  => UomRepository::class,
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
