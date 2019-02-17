<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CoursesRepositoryInterface;
use App\Repositories\CoursesRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CoursesRepositoryInterface::class, CoursesRepository::class);
    }
}
