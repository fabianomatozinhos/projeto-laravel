<?php

namespace App\Providers;

use App\Repositorios\EloquentSeriesRepositorio;
use App\Repositorios\SeriesRepositorioInterface;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{

    public array $bindings = [
        SeriesRepositorioInterface::class => EloquentSeriesRepositorio::class
    ];

    //ou


    /**
     * Register services.
     *
     * @return void
     */
    // public function register()
    // {
    //     $this->app->bind(SeriesRepositorioInterface::class, EloquentSeriesRepositorio::class);
    // }

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
