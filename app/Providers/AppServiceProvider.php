<?php

namespace App\Providers;

use App\Repositories\Category\CategoryCacheRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Issue\ApiIssueRepository;
use App\Repositories\Issue\DatabaseIssueRepository;
use App\Repositories\Issue\IssueRepositoryInterface;
use App\Repositories\Project\ApiProjectRepository;
use App\Repositories\Project\DatabaseProjectRepository;
use App\Repositories\Project\ProjectRepositoryInterface;
use App\Services\Interfaces\IssueServiceinterface;
use App\Services\Interfaces\ProjectServiceInterface;
use App\Services\IssueService;
use App\Services\ProjectService;
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

        $this->app->bind(IssueRepositoryInterface::class, config('api.type') === 'database'
                ? DatabaseIssueRepository::class
                : ApiIssueRepository::class);

        $this->app->bind(ProjectServiceInterface::class, ProjectService::class);
        $this->app->bind(IssueServiceinterface::class, IssueService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
