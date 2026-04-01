<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MenuCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'order' => ['required', 'integer', 'min:0'],
            'open_type' => ['required', 'in:_self,_blank'],
            'is_active' => ['nullable', 'boolean']

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Menü adı zorunludur.',
            'name.string' => 'Menü adı metin olmalıdır.',
            'name.max' => 'Menü adı en fazla 255 karakter olabilir.',
            'url.required' => 'Menü URL\'si zorunludur.',
            'url.string' => 'Menü URL\'si metin olmalıdır.',
            'url.max' => 'Menü URL\'si en fazla 255 karakter olabilir.',
            'order.required' => 'Menü sırası zorunludur.',
            'order.integer' => 'Menü sırası bir tam sayı olmalıdır.',
            'order.min' => 'Menü sırası 0 veya daha büyük olmalıdır.',
            'open_type.required' => 'Menü açılma türü zorunludur.',
            'open_type.in' => 'Menü açılma türü _self veya _blank olmalıdır.',
            'is_active.boolean' => 'Menü aktiflik durumu true veya false olmalıdır.'
        ];
    }
}
