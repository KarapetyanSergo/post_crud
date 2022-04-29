<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request, CommentService $service): JsonResponse
    {
        return response()->json($service->create($request->validated()));
    }

    public function destroy(CommentService $service, Comment $comment): JsonResponse
    {
        return response()->json($service->delete($comment));
    }
}
