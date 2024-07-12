<?php

namespace App\Repositories\Project;

use Symfony\Component\HttpFoundation\ParameterBag;

class DatabaseProjectRepository implements ProjectRepositoryInterface
{

    public function getProjects(ParameterBag $filters)
    {
        dd('db');
    }
}
