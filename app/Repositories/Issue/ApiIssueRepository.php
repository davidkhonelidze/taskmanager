<?php

namespace App\Repositories\Issue;

use App\Repositories\ApiRepository;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiIssueRepository extends ApiRepository implements IssueRepositoryInterface
{

    public function getIssues(ParameterBag $filters)
    {
        // TODO: Implement getIssues() method.
    }
}
