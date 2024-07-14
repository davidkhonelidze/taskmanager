<?php

namespace App\Repositories\IssuePriority;

use App\Services\ApiService;

class ApiissuePriorityrepository implements IssuePriorityRepositoryInterface
{
    public function __construct(private ApiService $apiService)
    {
    }
    public function getIssuePriorities()
    {
        $data = $this->apiService->fetchData('/enumerations/issue_priorities.json', 'issue_priorities');

        $transformedData = $this->apiService->transformData($data['data'], function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
        });

        return $this->apiService->paginateData($transformedData, 100, 100);
    }
}
