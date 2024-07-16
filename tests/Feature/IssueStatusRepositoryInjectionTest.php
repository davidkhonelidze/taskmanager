<?php

namespace Tests\Feature;

use App\Providers\AppServiceProvider;
use App\Repositories\IssueStatus\ApiIssueStatusRepository;
use App\Repositories\IssueStatus\DatabaseIssueStatusRepository;
use App\Repositories\IssueStatus\IssueStatusRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IssueStatusRepositoryInjectionTest extends TestCase
{
    public function testDatabaseRepositoryIsInjectedWhenApiTypeIsDatabase()
    {
        $repository = $this->app->make(IssueStatusRepositoryInterface::class);
        $this->assertInstanceOf(DatabaseIssueStatusRepository::class, $repository);
    }

    public function testApiRepositoryIsInjectedWhenApiTypeIsApi()
    {
        $this->app['config']->set('api.type', 'api');

        $provider = new AppServiceProvider($this->app);
        $provider->register();

        $repository = $this->app->make(IssueStatusRepositoryInterface::class);

        $this->assertInstanceOf(ApiIssueStatusRepository::class, $repository);
    }
}
