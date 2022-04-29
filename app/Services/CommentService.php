<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public function create(array $requestData): Comment
    {
        return Comment::create($requestData);
    }

    public function delete(Comment $comment): Comment
    {
        $comment->delete();
        return $comment;
    }
}
