<?php

namespace App\Providers;

use App\Contracts\CityContract;
use App\Contracts\UomContract;
use App\Contracts\PaymentTermContract;

use Illuminate\Support\ServiceProvider;

use App\Repositories\CityRepository;
use App\Repositories\UomRepository;
use App\Repositories\PaymentTermRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        CityContract::class => CityRepository::class,
        UomContract::class  => UomRepository::class,
        PaymentTermContract::class  => PaymentTermRepository::class,
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
