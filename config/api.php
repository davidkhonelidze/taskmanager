<?php

return [
    'type' => env('API_TYPE', 'database'),
    'url' => env('API_URL', ''),
    'key' => env('API_KEY', ''),
    'per_page' => env('API_PER_PAGE', 10),
];
