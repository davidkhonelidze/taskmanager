<?php

namespace App\Repositories\Project;

use App\Repositories\ApiRepository;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiProjectRepository extends ApiRepository implements ProjectRepositoryInterface
{
    public function getProjects(ParameterBag $filters)
    {
        $url = $this->url . '/' . 'projects.json';
        $response = Http::get($url);

        return $response->json();
    }
}
