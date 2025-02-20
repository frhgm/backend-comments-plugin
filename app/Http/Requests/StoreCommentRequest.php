<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    // TODO: Autorizar
    // public function authorize(): bool
    // {
    //     return auth()->check(); // Ensure user is logged in
    // }

    public function rules(): array
    {
        return [
            'content' => 'required|string|min:3|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Comment content is required.',
            'content.string' => 'Comment must be a valid text.',
            'content.min' => 'Comment must be at least 3 characters.',
            'content.max' => 'Comment must not exceed 100 characters.',
        ];
    }
}
