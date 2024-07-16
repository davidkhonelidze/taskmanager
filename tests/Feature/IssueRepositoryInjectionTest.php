<?php

namespace Tests\Feature;

use App\Providers\AppServiceProvider;
use App\Repositories\Issue\ApiIssueRepository;
use App\Repositories\Issue\DatabaseIssueRepository;
use App\Repositories\Issue\IssueRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IssueRepositoryInjectionTest extends TestCase
{
    public function testDatabaseRepositoryIsInjectedWhenApiTypeIsDatabase()
    {
        $repository = $this->app->make(IssueRepositoryInterface::class);
        $this->assertInstanceOf(DatabaseIssueRepository::class, $repository);
    }

    public function testApiRepositoryIsInjectedWhenApiTypeIsApi()
    {
        $this->app['config']->set('api.type', 'api');

        $provider = new AppServiceProvider($this->app);
        $provider->register();

        $repository = $this->app->make(IssueRepositoryInterface::class);

        $this->assertInstanceOf(ApiIssueRepository::class, $repository);
    }
}
