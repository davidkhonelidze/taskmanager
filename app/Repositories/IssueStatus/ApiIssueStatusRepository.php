<?php

namespace App\Repositories\IssueStatus;

use App\Services\ApiService;

class ApiIssueStatusRepository implements IssueStatusRepositoryInterface
{
    public function __construct(private ApiService $apiService)
    {
    }

    public function getIssueStatuses()
    {
        $data = $this->apiService->fetchData('issue_statuses.json', 'issue_statuses');

        $transformedData = $this->apiService->transformData($data['data'], function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
        });

        return $this->apiService->paginateData($transformedData, 100, 100);
    }
}
