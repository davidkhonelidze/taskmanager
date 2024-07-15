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

    public function store(ParameterBag $data)
    {
        // there is no project search option in redmine api
        // use id 1 as default
        $data->set('project_id', 1);

        $this->issueRepository->store($data);
    }

    public function delete(int $id)
    {
        $this->issueRepository->delete($id);
    }
}
