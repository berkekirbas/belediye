<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SuggestionCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'string', 'max:255'],
            'tc'=> ['required', 'string', 'max:11'],
            'birthdate' => ['nullable', 'date'],
            'email' => ['required', 'email', 'max:255'],
            'job' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
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
            'tc.required' => 'TC kimlik numarası zorunludur.',
            'tc.string' => 'TC kimlik numarası metin olmalıdır.',
            'tc.max' => 'TC kimlik numarası en fazla 11 karakter olabilir.',
            'birthdate.date' => 'Doğum tarihi geçerli bir tarih olmalıdır.',
            'birthdate.nullable' => 'Doğum tarihi isteğe bağlıdır.',
            'email.nullable' => 'E-posta isteğe bağlıdır.',
            'email.email' => 'E-posta geçerli bir e-posta adresi olmalıdır.',
            'email.max' => 'E-posta en fazla 255 karakter olabilir.',
            'email.required' => 'E-posta zorunludur.',
            'job.nullable' => 'Meslek isteğe bağlıdır.',
            'job.string' => 'Meslek metin olmalıdır.',
            'job.max' => 'Meslek en fazla 255 karakter olabilir.',
            'address.nullable' => 'Adres isteğe bağlıdır.',
            'address.string' => 'Adres metin olmalıdır.',
            'content.required' => 'İçerik zorunludur.',
            'content.string' => 'İçerik metin olmalıdır.',
            'is_read.nullable' => 'Okunma durumu isteğe bağlıdır.',
            'is_read.boolean' => 'Okunma durumu true veya false olmalıdır.'
        ];
    }
}
