<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ActivityCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,webp,gif,jpg', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'order' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Sayfa başlığı zorunludur.',
            'title.max' => 'Sayfa başlığı en fazla 255 karakter olabilir.',
            'location.required' => 'Konum alanı zorunludur.',
            'location.max' => 'Konum alanı en fazla 255 karakter olabilir.',
            'content.required' => 'Sayfa içeriği zorunludur.',
            'start_date.required' => 'Başlangıç tarihi zorunludur.',
            'start_date.date' => 'Başlangıç tarihi geçerli bir tarih olmalıdır.',
            'end_date.required' => 'Bitiş tarihi zorunludur.',
            'end_date.date' => 'Bitiş tarihi geçerli bir tarih olmalıdır.',
            'end_date.after_or_equal' => 'Bitiş tarihi, başlangıç tarihinden sonra olmalıdır.',
            'image.image' => 'Dosya bir görsel olmalıdır.',
            'image.mimes' => 'Görsel formatı jpg, jpeg, png, webp veya gif olmalıdır.',
            'image.max' => 'Görsel boyutu en fazla 2MB olabilir.',
            'order.required' => 'Sıra numarası zorunludur.',
            'order.integer' => 'Sıra numarası bir tam sayı olmalıdır.',
        ];
    }
}
