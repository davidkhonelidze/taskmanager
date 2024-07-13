<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\Interfaces\ApiServiceInterface;

class ApiService implements ApiServiceInterface
{
    public function fetchData(string $endpoint, string $dataKey): Collection
    {
        $url = config('api.url') . '/' . $endpoint;

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            return collect($data[$dataKey]);
        }

        throw new \Exception('Failed to fetch data from ' . $endpoint);
    }

    public function transformData(Collection $data, callable $callback): Collection
    {
        return $data->map($callback);
    }

    public function paginateData(Collection $data, int $perPage): LengthAwarePaginator
    {
        $page = request()->get('page', 1);
        $total = $data->count();

        return new LengthAwarePaginator(
            $data->forPage($page, $perPage),
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}
