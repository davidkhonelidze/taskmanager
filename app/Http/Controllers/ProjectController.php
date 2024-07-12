<?php

namespace App\Http\Controllers;

use App\Http\Requests\Projects\ListRequest;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

class ProjectController extends Controller
{
    public function __construct(private ProjectService $projectService)
    {
    }

    public function index(ListRequest $request)
    {
        $filters = new ParameterBag($request->validated());
        $projects = $this->projectService->getProjects($filters);
    }
}
