<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\ParameterBag;

interface ApiServiceInterface
{
    public function fetchData(string $endpoint, string $dataKey, ?array $args = null): array;
    public function transformData(Collection $data, callable $callback): Collection;
    public function paginateData(Collection $data, int $total, int $perPage): LengthAwarePaginator;
    public function storeData(string $endpoint, ParameterBag $data, string $dataKey);
    public function getFormatListingFilters(ParameterBag $filters): array;
}
