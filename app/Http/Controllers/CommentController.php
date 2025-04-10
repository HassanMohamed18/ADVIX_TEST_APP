<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index()
    {
        return response()->json($this->commentService->getAllComments());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'case_id' => 'required|exists:test_cases,id',
            'user_id' => 'required|exists:users,id',
            'comment_text' => 'required|string'
        ]);

        return response()->json($this->commentService->createComment($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->commentService->getCommentById($id));
    }

    public function destroy($id)
    {
        return response()->json(['deleted' => $this->commentService->deleteComment($id)]);
    }
}
