<?php

namespace App\Services;

use App\Repositories\Tracker\TrackerRepositoryInterface;
use App\Services\Interfaces\TrackerServiceInterface;

class TrackerService implements TrackerServiceInterface
{
    public function __construct(private TrackerRepositoryInterface $trackerRepository)
    {
    }

    public function getTrackers()
    {
        return $this->trackerRepository->getTrackers();
    }
}
