<?php

namespace App\Repositories\Project;

use App\Services\ApiService;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiProjectRepository implements ProjectRepositoryInterface
{
    public function __construct(private ApiService $apiService)
    {
    }

    public function getProjects(ParameterBag $filters): LengthAwarePaginator
    {
        $data = $this->apiService->fetchData('projects.json', 'projects');

        $transformedData = $this->apiService->transformData($data['data'], function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'identifier' => $item['identifier'],
                'description' => $item['description'],
                'is_public' => $item['is_public'],
                'updated_on' => $item['updated_on'],
            ];
        });

        return $this->apiService->paginateData($transformedData, $data['total'], $data['per_page']);
    }

    public function show(int $id)
    {
        $data = $this->apiService->fetchData('projects/' . $id . '.json', 'project');

        return $data;
    }
}
