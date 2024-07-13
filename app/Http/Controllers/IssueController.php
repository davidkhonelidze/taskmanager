<?php

namespace App\Http\Controllers;

use App\Http\Requests\Issues\CreateRequest;
use App\Http\Requests\Issues\ListRequest;
use App\Http\Resources\IssuesResource;
use App\Http\Resources\TrackersResource;
use App\Services\Interfaces\IssueServiceinterface;
use App\Services\Interfaces\TrackerServiceInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\ParameterBag;

class IssueController extends Controller
{
    public function __construct(
        private IssueServiceinterface $issueService,
        private TrackerServiceInterface $trackerService
    ) {
    }

    public function index(ListRequest $request)
    {
        $filters = new ParameterBag($request->validated());
        $issues = $this->issueService->getIssues($filters);

        return Inertia::render(
            'Issues/List',
            [
                'issues' => IssuesResource::collection($issues),
                'title' => 'Issues',
            ]
        );
    }

    public function create()
    {
        $trackers = $this->trackerService->getTrackers();

        return Inertia::render(
            'Issues/Create',
            [
                'title' => 'Create new issue',
                'trackers' => TrackersResource::collection($trackers),
            ]
        );
    }

    public function store(CreateRequest $request)
    {
    }
}
