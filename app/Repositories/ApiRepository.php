<?php

namespace App\Repositories;

class ApiRepository
{
    protected string $url;
    protected string $key;

    public function __construct()
    {
        $this->url = config('api.url');
        $this->key = config('api.key');
    }
}
