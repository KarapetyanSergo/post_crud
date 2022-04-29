<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'string',
            'description' => 'string|max:255',
            'image' => 'string'
        ];
    }
}
