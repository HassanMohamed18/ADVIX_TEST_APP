<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->json($this->userService->getAllUsers());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:Tester,Developer,Manager',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        return response()->json($this->userService->createUser($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->userService->getUserById($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'role' => 'sometimes|in:Tester,Developer,Manager',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|min:6'
        ]);

        return response()->json($this->userService->updateUser($id, $data));
    }

    public function destroy($id)
    {
        return response()->json(['deleted' => $this->userService->deleteUser($id)]);
    }
}

