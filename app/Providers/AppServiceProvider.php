<?php

namespace App\Providers;

use App\Repositories\Content\ContectHomePage\ContentRepository;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\ServiceRepositoryInterface;
use App\Services\User\UserServices;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ContentRepository::class);
        $this->app->singleton(UserServices::class, function ($app) {
            return new UserServices();
        });
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
