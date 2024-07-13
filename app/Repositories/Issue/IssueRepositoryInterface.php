<?php

namespace App\Repositories\Issue;

use Symfony\Component\HttpFoundation\ParameterBag;

interface IssueRepositoryInterface
{
    public function getIssues(ParameterBag $filters);
}
