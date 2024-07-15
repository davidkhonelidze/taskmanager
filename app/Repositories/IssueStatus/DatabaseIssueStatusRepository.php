<?php

namespace App\Repositories\IssueStatus;

use App\Models\IssueStatus;

class DatabaseIssueStatusRepository implements IssueStatusRepositoryInterface
{
    public function getIssueStatuses()
    {
        $query = IssueStatus::query();
        $query->orderBy('id', 'desc');
        return $query->paginate(config('api.per_page'));
    }
}
