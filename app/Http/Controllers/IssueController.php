<?php

namespace App\Http\Controllers;

use App\Http\Requests\Issues\CreateRequest;
use App\Http\Requests\Issues\ListRequest;
use App\Http\Resources\IssuePrioritiesResource;
use App\Http\Resources\IssuesResource;
use App\Http\Resources\IssueStatusesResource;
use App\Http\Resources\TrackersResource;
use App\Services\Interfaces\IssueServiceinterface;
use App\Services\Interfaces\IssueStatusServiceInterface;
use App\Services\Interfaces\TrackerServiceInterface;
use App\Services\IssuePriorityService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\ParameterBag;

class IssueController extends Controller
{
    public function __construct(
        private IssueServiceinterface $issueService,
        private TrackerServiceInterface $trackerService,
        private IssueStatusServiceInterface $issueStatusService,
        private IssuePriorityService $issuePriorityService,
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
        $issueStatuses = $this->issueStatusService->getIssueStatuses();
        $issuePriorities = $this->issuePriorityService->getIssuePriorities();

        return Inertia::render(
            'Issues/Create',
            [
                'title' => 'Create new issue',
                'trackers' => TrackersResource::collection($trackers),
                'issueStatuses' => IssueStatusesResource::collection($issueStatuses),
                'issuePriorities' => IssuePrioritiesResource::collection($issuePriorities),
            ]
        );
    }

    public function store(CreateRequest $request)
    {
        $this->issueService->store(new ParameterBag($request->validated()));
    }
}
