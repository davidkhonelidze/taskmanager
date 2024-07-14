<?php

namespace App\Services;

use App\Repositories\IssueStatus\IssueStatusRepositoryInterface;
use App\Services\Interfaces\IssueStatusServiceInterface;

class IssueStatusService implements IssueStatusServiceInterface
{
    public function __construct(private IssueStatusRepositoryInterface $issueStatusRepository)
    {
    }

    public function getIssueStatuses()
    {
        return $this->issueStatusRepository->getIssueStatuses();
    }
}
