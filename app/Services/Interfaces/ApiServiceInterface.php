<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ApiServiceInterface
{
    public function fetchData(string $endpoint, string $dataKey): Collection;
    public function transformData(Collection $data, callable $callback): Collection;
    public function paginateData(Collection $data, int $perPage): LengthAwarePaginator;
}
