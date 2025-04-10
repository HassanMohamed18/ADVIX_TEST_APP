<?php

namespace App\Services;

use App\Models\Project;

class ProjectService
{
    public function getAllProjects()
    {
        return Project::all();
    }

    public function getProjectById($id)
    {
        return Project::findOrFail($id);
    }

    public function createProject($data)
    {
        return Project::create($data);
    }

    public function updateProject($id, $data)
    {
        $project = Project::findOrFail($id);
        $project->update($data);
        return $project;
    }

    public function deleteProject($id)
    {
        return Project::destroy($id);
    }
}
