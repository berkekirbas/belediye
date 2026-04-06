<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PhotoGalleryUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,webp,gif,jpg', 'max:2048'],
            'photos.*' => ['nullable', 'image', 'mimes:jpeg,png,webp,gif,jpg', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'order' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Albüm adı zorunludur.',
            'title.max' => 'Albüm adı en fazla 255 karakter olabilir.',
            'image.image' => 'Kapak dosyası bir görsel olmalıdır.',
            'image.mimes' => 'Kapak görseli formatı jpg, jpeg, png, webp veya gif olmalıdır.',
            'image.max' => 'Kapak görseli boyutu en fazla 2MB olabilir.',
            'photos.*.image' => 'Yüklenen dosyalar görsel olmalıdır.',
            'photos.*.mimes' => 'Görsel formatı jpg, jpeg, png, webp veya gif olmalıdır.',
            'photos.*.max' => 'Her görsel en fazla 2MB olabilir.',
            'order.required' => 'Sıra numarası zorunludur.',
            'order.integer' => 'Sıra numarası bir tam sayı olmalıdır.',
        ];
    }
}
