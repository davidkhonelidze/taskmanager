<?php

namespace App\Http\Controllers;

use App\Http\Resources\IssuesResource;
use App\Services\Interfaces\IssueServiceinterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\ParameterBag;

class IndexController extends Controller
{
    public function __construct(private IssueServiceinterface $issueService)
    {
    }

    public function index()
    {
        $issues = $this->issueService->getIssues(new ParameterBag());

        return Inertia::render(
            'Index/Index',
            [
                'title' => 'Home Page',
                'issues' => IssuesResource::collection($issues),
            ]
        );
    }
}
