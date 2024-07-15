<?php

namespace App\Repositories\Issue;

use App\Models\Issue;
use Symfony\Component\HttpFoundation\ParameterBag;

class DatabaseIssueRepository implements IssueRepositoryInterface
{

    public function getIssues(ParameterBag $filters)
    {
        $query = Issue::with(['status', 'priority', 'tracker']);

        foreach ($filters->all() as $k => $v) {
            switch ($k) {
                case 'status_id':
                case 'tracker_id':
                case 'priority_id':
                    $query->where($k, $v);
                    break;
            }
        }

        $query->orderBy('id', 'desc');
        return $query->paginate(config('api.per_page'));
    }

    public function store(ParameterBag $data)
    {
        Issue::create($data->all());
    }

    public function delete(int $id)
    {
        Issue::where('id', $id)->delete();
    }
}
