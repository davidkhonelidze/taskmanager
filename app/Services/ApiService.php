<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\Interfaces\ApiServiceInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiService implements ApiServiceInterface
{
    public function fetchData(string $endpoint, string $dataKey, ?array $args = null): array
    {
        $url = config('api.url') . '/' . $endpoint;

        if (is_array($args)) {
            $url .= '?';
            foreach ($args as $k => $v) {
                $url .= $k . '=' . $v . '&';
            }
        }

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            $finalData = [
                'data' => collect($data[$dataKey]),
            ];

            if (isset($data['total_count'])) {
                $finalData['total'] = $data['total_count'];
            }

            if (isset($data['limit'])) {
                $finalData['per_page'] = $data['limit'];
            }

            return $finalData;
        }

        throw new \Exception('Failed to fetch data from ' . $endpoint);
    }

    public function transformData(Collection $data, callable $callback): Collection
    {
        return $data->map($callback);
    }

    public function paginateData(Collection $data, int $total, int $perPage): LengthAwarePaginator
    {
        $page = request()->get('page', 1);

        return new LengthAwarePaginator(
            $data, //$data->forPage($page, $perPage),
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    public function storeData(string $endpoint, ParameterBag $data, string $dataKey)
    {
        $url = config('api.url') . '/' . $endpoint;

        $formData = [
            $dataKey => $data->all(),
        ];

        $formData[$dataKey]['project_id'] = 1;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Redmine-API-Key' => config('api.key'),
        ])->post($url, $formData);

        $response->throw();
    }

    public function getFormatListingFilters(ParameterBag $filters): array
    {
        $args = [
            'limit' => config('api.per_page'),
        ];

        foreach ($filters->all() as $k => $v) {
            switch ($k) {
                case 'page':
                    $args['offset'] = $args['limit'] * ($filters->getInt('page') - 1);
                    break;

                case 'status_id':
                case 'tracker_id':
                case 'priority_id':
                    $args[$k] = $v;
                    break;
            }
        }

        return $args;
    }

    public function deleteData(string $endpoint)
    {
        $url = config('api.url') . '/' . $endpoint;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Redmine-API-Key' => config('api.key'),
        ])->delete($url);

        $response->throw();
    }
}
