<?php

namespace App\Repositories\Project;

use App\Models\Project;
use Symfony\Component\HttpFoundation\ParameterBag;

class DatabaseProjectRepository implements ProjectRepositoryInterface
{

    public function getProjects(ParameterBag $filters)
    {
        $query = Project::query();

        //$query->take(config('api.per_page'));
        $query->orderBy('id', 'desc');
        return $query->paginate(config('api.per_page'));
    }
}
