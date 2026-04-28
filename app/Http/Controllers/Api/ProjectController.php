<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Services\ProjectService;
use Dedoc\Scramble\Attributes\PathParameter;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use AuthorizesRequests;
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * All
     */
    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        return ProjectResource::collection($projects);
    }

    /**
     * Show (by id)
     */
    public function show(Project $project)
    {
        // This checks the Policy. If false, it throws 403.
        $this->authorize('view', $project);

        return new ProjectResource($project);
    }

    /**
     * Create
     */
    public function store(ProjectStoreRequest $request)
    {
//        $request->validate([
//            'title' => 'required|max:255',
//            'description' => 'required|max:1000',
//        ]);

        $project = $this->projectService->createProject($request->all());

        return new ProjectResource($project);
    }

    /**
     * Update
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        // Authorization Check (Policy)
        $this->authorize('update', $project);

//        $request->validate([
//            'title' => 'sometimes|required|max:255',
//            'description' => 'sometimes|required|max:1000',
//        ]);

        $project = $this->projectService->updateProject($project, $request->all());

        return new ProjectResource($project);
    }

    /**
     * Delete
     */
    public function destroy(Project $project)
    {
        // Authorization Check (Policy)
        $this->authorize('delete', $project);

        $this->projectService->deleteProject($project);

        return response()->json(null, 204);
    }
}