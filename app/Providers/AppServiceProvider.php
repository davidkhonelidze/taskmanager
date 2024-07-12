<?php

namespace App\Providers;

use App\Repositories\Project\ApiProjectRepository;
use App\Repositories\Project\DatabaseProjectRepository;
use App\Repositories\Project\ProjectRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, function ($app) {
            return config('api.type') === 'database'
                ? new DatabaseProjectRepository()
                : new ApiProjectRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
