<?php

namespace Tests\Feature;

use App\Providers\AppServiceProvider;
use App\Repositories\Tracker\ApiTrackerRepository;
use App\Repositories\Tracker\DatabaseTrackerRepository;
use App\Repositories\Tracker\TrackerRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrackerRepositoryInjectionTest extends TestCase
{
    public function testDatabaseRepositoryIsInjectedWhenApiTypeIsDatabase()
    {
        $repository = $this->app->make(TrackerRepositoryInterface::class);
        $this->assertInstanceOf(DatabaseTrackerRepository::class, $repository);
    }

    public function testApiRepositoryIsInjectedWhenApiTypeIsApi()
    {
        $this->app['config']->set('api.type', 'api');

        $provider = new AppServiceProvider($this->app);
        $provider->register();

        $repository = $this->app->make(TrackerRepositoryInterface::class);

        $this->assertInstanceOf(ApiTrackerRepository::class, $repository);
    }
}
