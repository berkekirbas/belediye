<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MessageCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'is_read' => ['nullable', 'boolean']
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Ad soyad zorunludur.',
            'fullname.string' => 'Ad soyad metin olmalıdır.',
            'fullname.max' => 'Ad soyad en fazla 255 karakter olabilir.',
            'email.nullable' => 'E-posta isteğe bağlıdır.',
            'email.email' => 'E-posta geçerli bir e-posta adresi olmalıdır.',
            'email.max' => 'E-posta en fazla 255 karakter olabilir.',
            'email.required' => 'E-posta zorunludur.',
            'title.nullable' => 'Başlık isteğe bağlıdır.',
            'title.string' => 'Başlık metin olmalıdır.',
            'title.max' => 'Başlık en fazla 255 karakter olabilir.',
            'content.required' => 'İçerik zorunludur.',
            'content.string' => 'İçerik metin olmalıdır.',
            'is_read.nullable' => 'Okunma durumu isteğe bağlıdır.',
            'is_read.boolean' => 'Okunma durumu true veya false olmalıdır.'
        ];
    }
}
