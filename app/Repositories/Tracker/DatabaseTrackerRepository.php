<?php

namespace App\Repositories\Tracker;

use App\Models\Tracker;

class DatabaseTrackerRepository implements TrackerRepositoryInterface
{
    public function getTrackers()
    {
        $query = Tracker::query();

        $query->orderBy('id', 'desc');
        return $query->paginate(config('api.per_page'));
    }
}
