<?php

namespace App\Services;

use App\Repositories\Issue\IssueRepositoryInterface;
use App\Services\Interfaces\IssueServiceinterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class IssueService implements IssueServiceinterface
{
    public function __construct(private IssueRepositoryInterface $issueRepository)
    {
    }

    public function getIssues(ParameterBag $filters)
    {
        return $this->issueRepository->getIssues($filters);
    }
}
