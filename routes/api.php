<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('posts')
    ->controller(PostController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{post}', 'show');
        Route::post('/', 'store');
        Route::put('/{post}', 'update');
        Route::delete('/{post}', 'destroy');
});

Route::prefix('comments')
    ->controller(CommentController::class)
    ->group(function () {
        Route::post('/', 'store');
        Route::delete('/{comment}', 'destroy');
    });
