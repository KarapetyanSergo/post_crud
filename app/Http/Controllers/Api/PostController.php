<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(PostService $service): JsonResponse
    {
        return response()->json($service->index());
    }

    public function store(PostService $service, PostRequest $request): JsonResponse
    {
        return response()->json($service->store($request->validated()));
    }

    public function show(Post $post): JsonResponse
    {
        $comments = $post->comments()->get()->all();

        return response()->json([
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function update(PostUpdateRequest $request, PostService $service, Post $post):JsonResponse
    {
        return response()->json($service->update($request->validated(), $post));
    }

    public function destroy(PostService $service, Post $post): jsonResponse
    {
        return response()->json($service->delete($post));
    }
}
