<?php

namespace App\Services;

use App\Repositories\IssuePriority\IssuePriorityRepositoryInterface;
use App\Services\Interfaces\IssuePriorityServiceinterface;

class IssuePriorityService implements IssuePriorityServiceinterface
{
    public function __construct(private IssuePriorityRepositoryInterface $issuePriorityRepository)
    {
    }

    public function getIssuePriorities()
    {
        return $this->issuePriorityRepository->getIssuePriorities();
    }
}
