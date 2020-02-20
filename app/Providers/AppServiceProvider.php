<?php

namespace App\Providers;

use App\Contracts\FuelEntryRepositoryContract;
use App\Contracts\InsurancePaymentRepositoryContract;
use App\Contracts\ServiceRepositoryContract;
use App\Contracts\VehicleRepositoryContract;
use App\Contracts\VehicleServiceContract;
use App\Contracts\VehicleTransformerContract;
use App\Repositories\FuelEntryRepository;
use App\Repositories\InsurancePaymentRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\VehicleRepository;
use App\Services\VehicleService;
use App\Transformers\VehicleExpensesTransformer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(VehicleServiceContract::class, VehicleService::class);
        $this->app->bind(VehicleRepositoryContract::class, VehicleRepository::class);
        $this->app->bind(ServiceRepositoryContract::class, ServiceRepository::class);
        $this->app->bind(FuelEntryRepositoryContract::class, FuelEntryRepository::class);
        $this->app->bind(InsurancePaymentRepositoryContract::class, InsurancePaymentRepository::class);
        $this->app->bind(VehicleTransformerContract::class, VehicleExpensesTransformer::class);
    }
}
