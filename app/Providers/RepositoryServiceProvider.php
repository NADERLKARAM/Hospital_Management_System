<?php

namespace App\Providers;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Interfaces\Sections\SectionRepositoryInterface;

use App\Interfaces\Services\ServiceRepositoryInterface;
use App\Repositories\Doctors\DoctorRepository;

use App\Repositories\Sections\SectionRepository;
use App\Repositories\Services\ServiceRepository;
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
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class,  DoctorRepository::class );
        $this->app->bind(ServiceRepositoryInterface::class,  ServiceRepository::class );
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