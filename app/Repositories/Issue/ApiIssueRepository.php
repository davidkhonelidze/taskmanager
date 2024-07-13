<?php

namespace App\Repositories\Issue;

use App\Repositories\ApiRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiIssueRepository extends ApiRepository implements IssueRepositoryInterface
{

    public function getIssues(ParameterBag $filters)
    {
        $url = $this->url . '/' . 'issues.json';
        $response = Http::get($url);

        $data = $response->json();

        $transformedData = collect($data['issues'])->map(function ($item) {
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

        $page = request()->get('page', 1);
        $perPage = 10;
        $total = count($transformedData);

        $paginatedData = new LengthAwarePaginator(
            $transformedData->forPage($page, $perPage),
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return $paginatedData;
    }
}
