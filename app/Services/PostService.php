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

    public function update(array $requestData, Post $post): Post
    {
        $post->update($requestData);
        return $post;
    }

    public function delete(Post $post): array
    {
        $post->delete();

        return [
            'message' => 'Success'
        ];
    }
}
