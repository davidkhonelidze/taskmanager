<?php

namespace App\Repositories\Project;

use Symfony\Component\HttpFoundation\ParameterBag;

class ApiProjectRepository implements ProjectRepositoryInterface
{

    public function getProjects(ParameterBag $filters)
    {
        // TODO: Implement getProjects() method.
        dd('API');
    }
}
