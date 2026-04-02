<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CondolenceCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'string', 'max:255'],
            'job' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'is_active' => ['nullable', 'boolean']
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Ad soyad zorunludur.',
            'fullname.string' => 'Ad soyad metin olmalıdır.',
            'fullname.max' => 'Ad soyad en fazla 255 karakter olabilir.',
            'job.nullable' => 'Meslek isteğe bağlıdır.',
            'job.string' => 'Meslek metin olmalıdır.',
            'job.max' => 'Meslek en fazla 255 karakter olabilir.',
            'message.required' => 'Mesaj zorunludur.',
            'message.string' => 'Mesaj metin olmalıdır.',
            'is_active.nullable' => 'Aktiflik durumu isteğe bağlıdır.',
            'is_active.boolean' => 'Aktiflik durumu true veya false olmalıdır.'
        ];
    }
}

