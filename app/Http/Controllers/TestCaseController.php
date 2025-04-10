<?php

namespace App\Http\Controllers;

use App\Services\TestCaseService;
use Illuminate\Http\Request;

class TestCaseController extends Controller
{
    protected $testCaseService;

    public function __construct(TestCaseService $testCaseService)
    {
        $this->testCaseService = $testCaseService;
    }

    public function index()
    {
        return response()->json($this->testCaseService->getAllTestCases());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'feature' => 'required|string|max:255',
            'description' => 'required|string',
            'expected_result' => 'required|string',
            'actual_result' => 'nullable|string',
            'status' => 'required|in:Pending,Passed,Failed',
            'case_type' => 'required|in:update,bug,other',
            'tester_id' => 'required|exists:users,id',
            'assigned_dev_id' => 'nullable|exists:users,id',
            'fix_status' => 'required|in:Not Started,In Progress,Resolved',
            'fix_date' => 'nullable|date'
        ]);

        return response()->json($this->testCaseService->createTestCase($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->testCaseService->getTestCaseById($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'feature' => 'required|string|max:255',
            'description' => 'required|string',
            'expected_result' => 'required|string',
            'actual_result' => 'nullable|string',
            'status' => 'required|in:Pending,Passed,Failed',
            'case_type' => 'required|in:update,bug,other',
            'tester_id' => 'required|exists:users,id',
            'assigned_dev_id' => 'nullable|exists:users,id',
            'fix_status' => 'required|in:Not Started,In Progress,Resolved',
            'fix_date' => 'nullable|date'
        ]);

        return response()->json($this->testCaseService->updateTestCase($id, $data));
    }

    public function destroy($id)
    {
        return response()->json(['deleted' => $this->testCaseService->deleteTestCase($id)]);
    }
}

