<?php

namespace App\Http\Controllers;

use App\Http\Requests\Issues\ListRequest;
use App\Http\Resources\IssuesResource;
use App\Services\Interfaces\IssueServiceinterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\ParameterBag;

class IssueController extends Controller
{
    public function __construct(private IssueServiceinterface $issueService)
    {
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
}
