<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        return response()->json($this->projectService->getAllProjects());
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required', 'description' => 'nullable']);
        return response()->json($this->projectService->createProject($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->projectService->getProjectById($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['name' => 'required', 'description' => 'nullable']);
        return response()->json($this->projectService->updateProject($id, $data));
    }

    public function destroy($id)
    {
        return response()->json(['deleted' => $this->projectService->deleteProject($id)]);
    }
}

