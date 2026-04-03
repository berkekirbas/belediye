<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UsersCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'permissions' => ['required', 'integer', 'in:1,2']
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Ad zorunludur.',
            'first_name.string' => 'Ad metin olmalıdır.',
            'first_name.max' => 'Ad en fazla 255 karakter olabilir.',
            'last_name.required' => 'Soyad zorunludur.',
            'last_name.string' => 'Soyad metin olmalıdır.',
            'last_name.max' => 'Soyad en fazla 255 karakter olabilir.',
            'email.required' => 'E-Mail zorunludur.',
            'email.email' => 'Geçerli bir E-Mail adresi giriniz.',
            'email.unique' => 'Bu E-Mail adresi zaten kullanılmaktadır.',
            'password.required' => 'Şifre zorunludur.',
            'password.string' => 'Şifre metin olmalıdır.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            'permissions.required' => 'Yetki zorunludur.',
            'permissions.integer' => 'Yetki bir tam sayı olmalıdır.',
            'permissions.in' => 'Geçersiz yetki seçimi.'
        ];
    }
}
