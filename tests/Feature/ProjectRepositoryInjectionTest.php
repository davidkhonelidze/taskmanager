<?php

namespace Tests\Feature;

use App\Providers\AppServiceProvider;
use App\Repositories\Project\ApiProjectRepository;
use App\Repositories\Project\DatabaseProjectRepository;
use App\Repositories\Project\ProjectRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class ProjectRepositoryInjectionTest extends TestCase
{
    public function testDatabaseRepositoryIsInjectedWhenApiTypeIsDatabase()
    {
        $repository = $this->app->make(ProjectRepositoryInterface::class);
        $this->assertInstanceOf(DatabaseProjectRepository::class, $repository);
    }

    public function testApiRepositoryIsInjectedWhenApiTypeIsApi()
    {
        $this->app['config']->set('api.type', 'api');

        $provider = new AppServiceProvider($this->app);
        $provider->register();

        $repository = $this->app->make(ProjectRepositoryInterface::class);

        $this->assertInstanceOf(ApiProjectRepository::class, $repository);
    }
}
