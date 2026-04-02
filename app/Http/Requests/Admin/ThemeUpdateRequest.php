<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ThemeUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'color1' => ['required', 'string', 'max:7'],
            'color2' => ['required', 'string', 'max:7'],
            'color3' => ['required', 'string', 'max:7']
        ];
    }

    public function messages()
    {
        return [
            'color1.required' => 'Renk 1 zorunludur.',
            'color1.string' => 'Renk 1 metin olmalıdır.',
            'color1.max' => 'Renk 1 en fazla 7 karakter olabilir.',
            'color2.required' => 'Renk 2 zorunludur.',
            'color2.string' => 'Renk 2 metin olmalıdır.',
            'color2.max' => 'Renk 2 en fazla 7 karakter olabilir.',
            'color3.required' => 'Renk 3 zorunludur.',
            'color3.string' => 'Renk 3 metin olmalıdır.',
            'color3.max' => 'Renk 3 en fazla 7 karakter olabilir.'
        ];
    }
}

