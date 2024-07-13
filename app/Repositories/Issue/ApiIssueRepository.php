<?php

namespace App\Repositories\Issue;

use App\Repositories\ApiRepository;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiIssueRepository extends ApiRepository implements IssueRepositoryInterface
{

    public function getIssues(ParameterBag $filters)
    {
        $url = $this->url . '/' . 'issues.json';
        $response = Http::get($url);

        return $response->json();
    }
}
