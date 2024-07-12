<?php

namespace App\Repositories\Project;

use Symfony\Component\HttpFoundation\ParameterBag;

interface ProjectRepositoryInterface
{
    public function getProjects(ParameterBag $filters);
}
