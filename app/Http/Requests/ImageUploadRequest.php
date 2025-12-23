<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'image' => [
                'required',
                'file',
                'image',
                'mimes:jpg,jpeg,png,webp,gif',
                'max:2048', // 2MB
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Image file is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Allowed types: jpg, jpeg, png, webp, gif.',
            'image.max' => 'Image size must not exceed 2MB.',
        ];
    }
}
