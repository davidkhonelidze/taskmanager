<?php

namespace App\Repositories\Project;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiProjectRepository implements ProjectRepositoryInterface
{
    private string $url;
    private string $key;

    public function __construct()
    {
        $this->url = config('api.url');
        $this->key = config('api.key');
    }

    public function getProjects(ParameterBag $filters)
    {
        $url = $this->url . '/' . 'projects.json';
        $response = Http::get($url);

        return $response->json();
    }
}
