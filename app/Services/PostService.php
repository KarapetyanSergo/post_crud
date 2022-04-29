<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function index(): Collection
    {
        return Post::all();
    }

    public function store(array $requestData): Post
    {
        return Post::create($requestData);
    }

    public function show(Post $post): array
    {
        $comments = $post->comments()->get()->all();

        return [
            'post' => $post,
            'comments' => $comments
        ];
    }

    public function update(array $requestData, Post $post): Post
    {
        $post->update($requestData);
        return $post;
    }

    public function delete(Post $post): Post
    {
        $post->delete();

        return $post;
    }
}
