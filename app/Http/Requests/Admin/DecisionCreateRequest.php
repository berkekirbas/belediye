<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DecisionCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'filename' => ['required', 'file', 'mimetypes:application/pdf', 'max:5120'],
            'is_active' => ['nullable', 'boolean'],
            'month' => ['required', 'integer', 'min:1', 'max:12'],
            'year' => ['required', 'integer', 'digits:4', 'min:2000', 'max:' . date('Y')],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Başlık zorunludur.',
            'filename.required' => 'PDF dosyası zorunludur.',
            'filename.mimes' => 'Sadece PDF yükleyebilirsiniz.',
            'filename.max' => 'Dosya en fazla 5MB olabilir.',
            'filename.mimetypes' => 'Sadece PDF formatında dosya yükleyebilirsiniz.',
            'month.required' => 'Ay seçimi zorunludur.',
            'month.min' => 'Geçersiz ay.',
            'month.max' => 'Geçersiz ay.',
            'year.required' => 'Yıl zorunludur.',
            'year.digits' => 'Yıl 4 haneli olmalıdır.',
        ];
    }
}
