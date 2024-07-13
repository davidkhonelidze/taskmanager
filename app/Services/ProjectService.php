<?php

namespace App\Services;

use App\Repositories\Project\ProjectRepositoryInterface;
use App\Services\Interfaces\ProjectServiceInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class ProjectService implements ProjectServiceInterface
{
    public function __construct(private ProjectRepositoryInterface $projectRepository)
    {
    }

    public function getProjects(ParameterBag $filters)
    {
        $projects = $this->projectRepository->getProjects($filters);

        return $projects;
    }
}
