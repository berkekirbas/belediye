<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $pageId = $this->route('id');
        $translationId = \App\Models\Page::find($pageId)?->translation()?->id;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:page_translations,slug,' . $translationId],
            'content' => ['required', 'string'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,webp,gif', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'order' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Sayfa başlığı zorunludur.',
            'title.max' => 'Sayfa başlığı en fazla 255 karakter olabilir.',
            'slug.required' => 'Slug alanı zorunludur.',
            'slug.unique' => 'Bu slug zaten kullanılıyor.',
            'content.required' => 'Sayfa içeriği zorunludur.',
            'image.image' => 'Dosya bir görsel olmalıdır.',
            'image.mimes' => 'Görsel formatı jpeg, png, webp veya gif olmalıdır.',
            'image.max' => 'Görsel boyutu en fazla 2MB olabilir.',
            'order.required' => 'Sıra numarası zorunludur.',
            'order.integer' => 'Sıra numarası bir tam sayı olmalıdır.',
        ];
    }
}
