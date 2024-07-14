<?php

namespace App\Providers;

use App\Repositories\Category\CategoryCacheRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Issue\ApiIssueRepository;
use App\Repositories\Issue\DatabaseIssueRepository;
use App\Repositories\Issue\IssueRepositoryInterface;
use App\Repositories\IssueStatus\ApiIssueStatusRepository;
use App\Repositories\IssueStatus\DatabaseIssueStatusRepository;
use App\Repositories\IssueStatus\IssueStatusRepositoryInterface;
use App\Repositories\Project\ApiProjectRepository;
use App\Repositories\Project\DatabaseProjectRepository;
use App\Repositories\Project\ProjectRepositoryInterface;
use App\Repositories\Tracker\ApiTrackerRepository;
use App\Repositories\Tracker\DatabaseTrackerRepository;
use App\Repositories\Tracker\TrackerRepositoryInterface;
use App\Services\Interfaces\IssueServiceinterface;
use App\Services\Interfaces\IssueStatusServiceInterface;
use App\Services\Interfaces\ProjectServiceInterface;
use App\Services\Interfaces\TrackerServiceInterface;
use App\Services\IssueService;
use App\Services\IssueStatusService;
use App\Services\ProjectService;
use App\Services\TrackerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, config('api.type') === 'database'
            ? DatabaseProjectRepository::class
            : ApiProjectRepository::class);

        $this->app->bind(IssueRepositoryInterface::class, config('api.type') === 'database'
                ? DatabaseIssueRepository::class
                : ApiIssueRepository::class);

        $this->app->bind(TrackerRepositoryInterface::class, config('api.type') === 'database'
            ? DatabaseTrackerRepository::class
            : ApiTrackerRepository::class);

        $this->app->bind(IssueStatusRepositoryInterface::class, config('api.type') === 'database'
            ? DatabaseIssueStatusRepository::class
            : ApiIssueStatusRepository::class);

        $this->app->bind(ProjectServiceInterface::class, ProjectService::class);
        $this->app->bind(IssueServiceinterface::class, IssueService::class);
        $this->app->bind(TrackerServiceInterface::class, TrackerService::class);
        $this->app->bind(IssueStatusServiceInterface::class, IssueStatusService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
