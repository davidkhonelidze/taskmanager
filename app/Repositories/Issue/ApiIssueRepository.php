<?php

namespace App\Repositories\Issue;

use App\Services\ApiService;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiIssueRepository implements IssueRepositoryInterface
{
    public function __construct(private ApiService $apiService)
    {
    }

    public function getIssues(ParameterBag $filters): LengthAwarePaginator
    {
        $args = [
            'limit' => 10,
        ];

        $data = $this->apiService->fetchData('issues.json', 'issues', $args);

        $transformedData = $this->apiService->transformData($data['data'], function ($item) {
            return [
                'id' => $item['id'],
                'project' => $item['project'],
                'tracker' => $item['tracker'],
                'priority' => $item['priority'],
                'status' => $item['status'],
                'subject' => $item['subject'],
                'updated_on' => $item['updated_on'],
            ];
        });

        return $this->apiService->paginateData($transformedData, $data['total'], $data['per_page']);
    }

    public function store(ParameterBag $data)
    {
        $this->apiService->storeData('issues.json', $data, 'issue');
    }
}
