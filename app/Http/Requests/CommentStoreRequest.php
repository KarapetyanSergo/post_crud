<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => 'required|string|max:255',
            'post_id' => 'required|integer|exists:posts,id',
        ];
    }
}
