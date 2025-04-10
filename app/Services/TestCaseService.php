<?php

namespace App\Services;

use App\Models\TestCase;

class TestCaseService
{
    public function getAllTestCases()
    {
        return TestCase::all();
    }

    public function getTestCaseById($id)
    {
        return TestCase::findOrFail($id);
    }

    public function createTestCase($data)
    {
        return TestCase::create($data);
    }

    public function updateTestCase($id, $data)
    {
        $testCase = TestCase::findOrFail($id);
        $testCase->update($data);
        return $testCase;
    }

    public function deleteTestCase($id)
    {
        return TestCase::destroy($id);
    }
}
