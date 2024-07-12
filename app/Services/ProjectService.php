<?php

namespace App\Services;

use App\Repositories\Project\ProjectRepositoryInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class ProjectService
{
    public function __construct(private ProjectRepositoryInterface $projectRepository)
    {

    }

    public function getProjects(ParameterBag $filters)
    {
        $projects = $this->projectRepository->getProjects($filters);

        dd($projects);
    }
}
