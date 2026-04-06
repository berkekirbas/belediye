<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'staff_group_id' => ['required', 'exists:staff_groups,id'],
            'full_name' => ['required', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,webp,gif,jpg', 'max:2048'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'order' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'staff_group_id.required' => 'Personel grubu seçimi zorunludur.',
            'staff_group_id.exists' => 'Seçilen personel grubu bulunamadı.',
            'full_name.required' => 'Ad Soyad zorunludur.',
            'full_name.max' => 'Ad Soyad en fazla 255 karakter olabilir.',
            'image.image' => 'Dosya bir görsel olmalıdır.',
            'image.mimes' => 'Görsel formatı jpg, jpeg, png, webp veya gif olmalıdır.',
            'image.max' => 'Görsel boyutu en fazla 2MB olabilir.',
            'facebook_url.url' => 'Geçerli bir Facebook URL giriniz.',
            'twitter_url.url' => 'Geçerli bir Twitter URL giriniz.',
            'instagram_url.url' => 'Geçerli bir Instagram URL giriniz.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'order.required' => 'Sıra numarası zorunludur.',
            'order.integer' => 'Sıra numarası bir tam sayı olmalıdır.',
        ];
    }
}
