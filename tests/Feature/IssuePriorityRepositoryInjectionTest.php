<?php

namespace Tests\Feature;

use App\Providers\AppServiceProvider;
use App\Repositories\IssuePriority\ApiissuePriorityrepository;
use App\Repositories\IssuePriority\DatabaseIssuePriorityRepository;
use App\Repositories\IssuePriority\IssuePriorityRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IssuePriorityRepositoryInjectionTest extends TestCase
{
    public function testDatabaseRepositoryIsInjectedWhenApiTypeIsDatabase()
    {
        $repository = $this->app->make(IssuePriorityRepositoryInterface::class);
        $this->assertInstanceOf(DatabaseIssuePriorityRepository::class, $repository);
    }

    public function testApiRepositoryIsInjectedWhenApiTypeIsApi()
    {
        $this->app['config']->set('api.type', 'api');

        $provider = new AppServiceProvider($this->app);
        $provider->register();

        $repository = $this->app->make(IssuePriorityRepositoryInterface::class);

        $this->assertInstanceOf(ApiissuePriorityrepository::class, $repository);
    }
}
