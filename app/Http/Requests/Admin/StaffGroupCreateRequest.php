<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StaffGroupCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'is_active' => ['nullable', 'boolean'],
            'order' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Grup adı zorunludur.',
            'name.max' => 'Grup adı en fazla 255 karakter olabilir.',
            'order.required' => 'Sıra numarası zorunludur.',
            'order.integer' => 'Sıra numarası bir tam sayı olmalıdır.',
        ];
    }
}
