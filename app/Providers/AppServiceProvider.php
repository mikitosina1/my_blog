<?php

namespace App\Providers;

use App\Contracts\ModuleAuthorization;
use App\Contracts\ModulePermissionStorage;
use App\Services\ModuleAuthorizationService;
use App\Services\ModulePermissionStorageService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            ModulePermissionStorage::class,
            ModulePermissionStorageService::class,
        );

        $this->app->singleton(
            ModuleAuthorization::class,
            ModuleAuthorizationService::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
