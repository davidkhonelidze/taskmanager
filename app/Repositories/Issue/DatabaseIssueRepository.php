<?php

namespace App\Repositories\Issue;

use App\Models\Issue;
use Symfony\Component\HttpFoundation\ParameterBag;

class DatabaseIssueRepository implements IssueRepositoryInterface
{

    public function getIssues(ParameterBag $filters)
    {
        $query = Issue::query();

        $query->orderBy('id', 'desc');
        return $query->paginate(config('api.per_page'));
    }

    public function store(ParameterBag $data)
    {
        // TODO: Implement store() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
