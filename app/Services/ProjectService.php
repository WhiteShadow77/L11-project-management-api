<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectService
{
    public function getAllProjects()
    {
        // Get projects only for the authenticated user
        return Auth::user()->projects;
    }

    public function createProject(array $data)
    {
        return Auth::user()->projects()->create($data);
    }

    public function updateProject(Project $project, array $data)
    {
        // Note: Authorization is handled in the Controller/Policy,
        // this service just performs the update.
        $project->update($data);
        return $project;
    }

    public function deleteProject(Project $project)
    {
        return $project->delete();
    }
}