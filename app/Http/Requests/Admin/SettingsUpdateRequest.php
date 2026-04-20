<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'favicon' => ['nullable', 'image', 'max:2048'],
            'footer_logo' => ['nullable', 'image', 'max:2048'],
            'orta_banner' => ['nullable', 'image', 'max:2048'],
            'baskan_photo' => ['nullable', 'image', 'max:2048'],
            'baskan_fullname' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'fax' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string'],
            'google_maps' => ['nullable', 'string'],
            'google_analytics' => ['nullable', 'string'],
            'facebook_url' => ['nullable', 'url'],
            'youtube_url' => ['nullable', 'url'],
            'twitter_url' => ['nullable', 'url'],
            'linkedin_url' => ['nullable', 'url'],
            'copyright' => ['nullable', 'string'],
            'privacy_policy' => ['nullable', 'string'],
            'kvkk' => ['nullable', 'string'],
            'recaptcha_key' => ['nullable', 'string'],
            'recaptcha_project_id' => ['nullable', 'string'],
            "recaptcha_api_key" => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Site başlığı zorunludur.',
            'url.required' => 'Site URL\'si zorunludur.',
            'logo.image' => 'Logo bir resim dosyası olmalıdır.',
            'logo.mimes' => 'Logo dosya türü geçersiz. Lütfen jpg, jpeg, png veya gif formatında bir dosya yükleyin.',
            'logo.max' => 'Logo dosyası boyutu 2MB\'dan fazla olamaz.',
            'favicon.image' => 'Favicon bir resim dosyası olmalıdır.',
            'favicon.mimes' => 'Favicon dosya türü geçersiz. Lütfen ico formatında bir dosya yükleyin.',
            'favicon.max' => 'Favicon dosyası boyutu 2MB\'dan fazla olamaz.',
            'footer_logo.image' => 'Footer logosu bir resim dosyası olmalıdır.',
            'footer_logo.mimes' => 'Footer logo dosya türü geçersiz. Lütfen jpg, jpeg, png veya gif formatında bir dosya yükleyin.',
            'footer_logo.max' => 'Footer logo dosyası boyutu 2MB\'dan fazla olamaz.',
            'orta_banner.image' => 'Orta banner bir resim dosyası olmalıdır.',
            'orta_banner.mimes' => 'Orta banner dosya türü geçersiz. Lütfen jpg, jpeg, png veya gif formatında bir dosya yükleyin.',
            'orta_banner.max' => 'Orta banner dosyası boyutu 2MB\'dan fazla olamaz.',
            'baskan_photo.image' => 'Başkan fotoğrafı bir resim dosyası olmalıdır.',
            'baskan_photo.mimes' => 'Başkan fotoğrafı dosya türü geçersiz. Lütfen jpg, jpeg, png veya gif formatında bir dosya yükleyin.',
            'baskan_photo.max' => 'Başkan fotoğrafı dosyası boyutu 2MB\'dan fazla olamaz.',
            'baskan_fullname.string' => 'Başkanın tam adı bir metin olmalıdır.',
            'phone.string' => 'Telefon numarası bir metin olmalıdır.',
            'phone.max' => 'Telefon numarası 20 karakterden fazla olamaz.',
            'fax.string' => 'Fax numarası bir metin olmalıdır.',
            'fax.max' => 'Fax numarası 20 karakterden fazla olamaz.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.max' => 'E-posta adresi 255 karakterden fazla olamaz.',
            'address.string' => 'Adres bir metin olmalıdır.',
            'google_maps.string' => 'Google Maps kodu bir metin olmalıdır.',
            'google_analytics.string' => 'Google Analytics kodu bir metin olmalıdır.',
            'facebook_url.url' => 'Geçerli bir Facebook URL\'si giriniz.',
            'youtube_url.url' => 'Geçerli bir YouTube URL\'si giriniz.',
            'twitter_url.url' => 'Geçerli bir Twitter URL\'si giriniz.',
            'linkedin_url.url' => 'Geçerli bir LinkedIn URL\'si giriniz.',
            'copyright.string' => 'Copyright metni bir metin olmalıdır.',
            'privacy_policy.string' => 'Gizlilik politikası metni bir metin olmalıdır.',
            'kvkk.string' => 'KVKK metni bir metin olmalıdır.',
            'recaptcha_key.string' => 'reCAPTCHA anahtarı bir metin olmalıdır.',
            'recaptcha_project_id.string' => 'reCAPTCHA proje ID\'si bir metin olmalıdır.',
        ];
    }
}
