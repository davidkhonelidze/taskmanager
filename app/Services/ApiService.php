<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\Interfaces\ApiServiceInterface;

class ApiService implements ApiServiceInterface
{
    public function fetchData(string $endpoint, string $dataKey, ?array $args = null): array
    {
        $url = config('api.url') . '/' . $endpoint;

        if (is_array($args)) {
            $url .= '?';
            foreach ($args as $k => $v) {
                $url .= $k . '=' . $v;
            }
        }

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            return [
                'data' => collect($data[$dataKey]),
                'total' => $data['total_count'],
                'per_page' => $data['limit'],
            ];
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
        //$total = $data->count();

        return new LengthAwarePaginator(
            $data->forPage($page, $perPage),
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}
