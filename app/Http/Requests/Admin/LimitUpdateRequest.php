<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LimitUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'project_limit' => ['required', 'integer', 'min:0'],
            'news_limit' => ['required', 'integer', 'min:0'],
            'notice_limit' => ['required', 'integer', 'min:0'],
            'photo_limit' => ['required', 'integer', 'min:0']
        ];
    }

    public function messages()
    {
        return [
            'project_limit.required' => 'Proje limiti zorunludur.',
            'project_limit.integer' => 'Proje limiti tamsayı olmalıdır.',
            'project_limit.min' => 'Proje limiti 0 veya daha büyük olmalıdır.',
            'news_limit.required' => 'Haber limiti zorunludur.',
            'news_limit.integer' => 'Haber limiti tamsayı olmalıdır.',
            'news_limit.min' => 'Haber limiti 0 veya daha büyük olmalıdır.',
            'notice_limit.required' => 'Duyuru limiti zorunludur.',
            'notice_limit.integer' => 'Duyuru limiti tamsayı olmalıdır.',
            'notice_limit.min' => 'Duyuru limiti 0 veya daha büyük olmalıdır.',
            'photo_limit.required' => 'Foto limiti zorunludur.',
            'photo_limit.integer' => 'Foto limiti tamsayı olmalıdır.',
            'photo_limit.min' => 'Foto limiti 0 veya daha büyük olmalıdır.'
        ];
    }
}


