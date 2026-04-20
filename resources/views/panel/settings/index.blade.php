@extends('layouts.app.app')

@section('content')
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Site Ayarları</h3>
            </div>
            <form class="card-body" action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Site Adı</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ $settings->title ?? old('title') }}">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Site URL</label>
                        <input name="url" id="url" class="form-control"
                            value="{{ $settings->url ?? old('url') }}">
                        <span class="text-danger">{{ $errors->first('url') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-3">
                        <label class="form-label">Logo</label>
                        <input type="file" class="form-control" name="logo"
                            accept="image/jpeg,image/png,image/webp,image/gif">
                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                        @if ($settings->logo)
                            <div class="mb-3 pt-2 text-center">
                                <img src="{{ $settings->logo_url }}"
                                    style="width:120px;height:auto;border-radius:4px; cursor:pointer;" alt="Logo"
                                    class="currentImage">
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label class="form-label">Footer Logo</label>
                        <input type="file" class="form-control" name="footer_logo"
                            accept="image/jpeg,image/png,image/webp,image/gif">
                        <span class="text-danger">{{ $errors->first('footer_logo') }}</span>
                        @if ($settings->footer_logo)
                            <div class="mb-3 pt-2 text-center">
                                <img src="{{ $settings->footer_logo_url }}"
                                    style="width:120px;height:auto;border-radius:4px; cursor:pointer;" alt="Footer Logo"
                                    class="currentImage">
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label class="form-label">Favicon</label>
                        <input type="file" class="form-control" name="favicon"
                            accept="image/jpeg,image/png,image/webp,image/ico/image/x-icon">
                        <span class="text-danger">{{ $errors->first('favicon') }}</span>
                        @if ($settings->favicon)
                            <div class="mb-3 pt-2 text-center">
                                <img src="{{ $settings->favicon_url }}"
                                    style="width:120px;height:auto;border-radius:4px; cursor:pointer;" alt="Favicon"
                                    class="currentImage">
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label class="form-label">Orta Banner</label>
                        <input type="file" class="form-control" name="orta_banner"
                            accept="image/jpeg,image/png,image/webp,image/gif">
                        <span class="text-danger">{{ $errors->first('orta_banner') }}</span>
                        @if ($settings->orta_banner)
                            <div class="mb-3 pt-2 text-center">
                                <img src="{{ $settings->orta_banner_url }}"
                                    style="width:120px;height:auto;border-radius:4px; cursor:pointer;" alt="Orta Banner"
                                    class="currentImage">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Başkan Foto</label>
                        <input type="file" class="form-control" name="baskan_photo"
                            accept="image/jpeg,image/png,image/webp,image/gif">
                        <span class="text-danger">{{ $errors->first('baskan_photo') }}</span>
                        @if ($settings->baskan_photo)
                            <div class="mb-3 pt-2 text-center">
                                <img src="{{ $settings->baskan_photo_url }}"
                                    style="width:120px;height:auto;border-radius:4px; cursor:pointer;" alt="Başkan Foto"
                                    class="currentImage">
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Başkan Ad & Soyad</label>
                        <input type="text" class="form-control" name="baskan_fullname"
                            value="{{ $settings->baskan_fullname ?? old('baskan_fullname') }}">
                        <span class="text-danger">{{ $errors->first('baskan_fullname') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Telefon</label>
                        <input type="text" class="form-control" name="phone"
                            value="{{ $settings->phone ?? old('phone') }}">
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Fax</label>
                        <input type="text" class="form-control" name="fax"
                            value="{{ $settings->fax ?? old('fax') }}">
                        <span class="text-danger">{{ $errors->first('fax') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">E-mail</label>
                        <input type="text" class="form-control" name="email"
                            value="{{ $settings->email ?? old('email') }}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Adres</label>
                        <textarea type="text" class="form-control" name="address" rows="3">{{ $settings->address ?? old('address') }}</textarea>
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Google Maps</label>
                        <textarea type="text" class="form-control" name="google_maps" rows="3">{{ $settings->google_maps ?? old('google_maps') }}</textarea>
                        <span class="text-danger">{{ $errors->first('google_maps') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Google Analytics</label>
                        <textarea type="text" class="form-control" name="google_analytics" rows="3">{{ $settings->google_analytics ?? old('google_analytics') }}</textarea>
                        <span class="text-danger">{{ $errors->first('google_analytics') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Facebook URL</label>
                        <input type="text" class="form-control" name="facebook_url"
                            value="{{ $settings->facebook_url ?? old('facebook_url') }}">
                        <span class="text-danger">{{ $errors->first('facebook_url') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">YouTube URL</label>
                        <input type="text" class="form-control" name="youtube_url"
                            value="{{ $settings->youtube_url ?? old('youtube_url') }}">
                        <span class="text-danger">{{ $errors->first('youtube_url') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Twitter URL</label>
                        <input type="text" class="form-control" name="twitter_url"
                            value="{{ $settings->twitter_url ?? old('twitter_url') }}">
                        <span class="text-danger">{{ $errors->first('twitter_url') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">Linkedin URL</label>
                        <input type="text" class="form-control" name="linkedin_url"
                            value="{{ $settings->linkedin_url ?? old('linkedin_url') }}">
                        <span class="text-danger">{{ $errors->first('linkedin_url') }}</span>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Copyright Metni</label>
                    <textarea name="copyright" class="form-control" rows="3">{{ $settings->copyright ?? old('copyright') }}</textarea>
                    <span class="text-danger">{{ $errors->first('copyright') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Gizlilik Metni</label>
                    <textarea name="privacy_policy" class="form-control" rows="3">{{ $settings->privacy_policy ?? old('privacy_policy') }}</textarea>
                    <span class="text-danger">{{ $errors->first('privacy_policy') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">KVKK Metni</label>
                    <textarea name="kvkk" class="form-control" rows="3">{{ $settings->kvkk ?? old('kvkk') }}</textarea>
                    <span class="text-danger">{{ $errors->first('kvkk') }}</span>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Recaptcha Proje ID</label>
                        <input type="text" class="form-control" name="recaptcha_project_id"
                            value="{{ $settings->recaptcha_project_id ?? old('recaptcha_project_id') }}">
                        <span class="text-danger">{{ $errors->first('recaptcha_project_id') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Recaptcha Site Anahtarı</label>
                        <input type="text" class="form-control" name="recaptcha_key"
                            value="{{ $settings->recaptcha_key ?? old('recaptcha_key') }}">
                        <span class="text-danger">{{ $errors->first('recaptcha_key') }}</span>
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label">Recaptcha Api Anahtarı</label>
                        <input type="text" class="form-control" name="recaptcha_api_key"
                            value="{{ $settings->recaptcha_api_key ?? old('recaptcha_api_key') }}">
                        <span class="text-danger">{{ $errors->first('recaptcha_api_key') }}</span>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Talep Formu</label>
                    <input type="checkbox" class="form-check-input" name="suggestion_status" value="1"
                        {{ $settings->suggestion_status ? 'checked' : '' }}>
                    <span class="text-danger">{{ $errors->first('suggestion_status') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Site Durumu</label>
                    <input type="checkbox" class="form-check-input" name="site_status" value="1"
                        {{ $settings->site_status ? 'checked' : '' }}>
                    <span class="text-danger">{{ $errors->first('site_status') }}</span>
                </div>



                <button type="submit" class="btn btn-success">Güncelle</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(".currentImage").on('click', function() {
            const imageUrl = $(this).attr('src');
            Swal.fire({
                imageUrl: imageUrl,
                confirmButtonText: 'Kapat',
                width: 800,
                showCloseButton: false
            });
        });
    </script>
@endsection
