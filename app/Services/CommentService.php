<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public function getAllComments()
    {
        return Comment::all();
    }

    public function getCommentById($id)
    {
        return Comment::findOrFail($id);
    }

    public function createComment($data)
    {
        return Comment::create($data);
    }

    public function deleteComment($id)
    {
        return Comment::destroy($id);
    }
}

