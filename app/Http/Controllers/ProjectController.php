<?php

namespace App\Http\Controllers;

use App\Http\Requests\Projects\ListRequest;
use App\Http\Resources\ProjectsResource;
use App\Services\Interfaces\ProjectServiceInterface;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProjectController extends Controller
{
    public function __construct(private ProjectServiceInterface $projectService)
    {
    }

    public function index(ListRequest $request)
    {
        $filters = new ParameterBag($request->validated());
        $projects = $this->projectService->getProjects($filters);

        return Inertia::render(
            'Projects/List',
            [
                'projects' => ProjectsResource::collection($projects),
                'title' => 'Projects',
            ]
        );
    }

    public function show($id)
    {
        $project = $this->projectService->show($id);

        if (!$project) {
            throw new HttpException(404, 'Not found');
        }

        return Inertia::render(
            'Projects/Item',
            [
                'project' => new ProjectsResource($project),
                'title' => 'Project',
            ]
        );
    }
}
