<?php

namespace App\Repositories\Tracker;

use App\Services\ApiService;

class ApiTrackerRepository implements TrackerRepositoryInterface
{
    public function __construct(private ApiService $apiService)
    {
    }

    public function getTrackers()
    {
        $data = $this->apiService->fetchData('trackers.json', 'trackers');

        $transformedData = $this->apiService->transformData($data['data'], function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
        });

        return $this->apiService->paginateData($transformedData, 100, 100);
    }
}
