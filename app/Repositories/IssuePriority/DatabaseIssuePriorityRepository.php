<?php

namespace App\Repositories\IssuePriority;

use App\Models\Enumeration;

class DatabaseIssuePriorityRepository implements IssuePriorityRepositoryInterface
{
    public function getIssuePriorities()
    {
        $query = Enumeration::query();
        $query->where('type', 'IssuePriority');
        $query->orderBy('id', 'desc');
        return $query->paginate(config('api.per_page'));
    }
}
