@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('staff') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Personel Düzenle</h3>
            </div>
            <form class="card-body" action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Personel Grubu</label>
                    <select name="staff_group_id" class="form-control">
                        <option value="">Grup Seçiniz</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}" {{ old('staff_group_id', $staff->staff_group_id) == $group->id ? 'selected' : '' }}>
                                {{ $group->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('staff_group_id') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Ad Soyad</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" value="{{ old('full_name', $staff->full_name) }}">
                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Ünvan</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $staff->title) }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Profil Görseli</label>
                    @if ($staff->image)
                        <div class="mb-2">
                            <img src="{{ $staff->image_url }}"
                                style="width:120px;height:auto;border-radius:4px;cursor:pointer;" alt="Profil Görseli"
                                id="currentImage">
                        </div>
                    @endif
                    <input type="file" class="form-control" name="image" id="imageInput" accept="image/jpeg,image/png,image/webp,image/gif">
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">İçerik</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content', $staff->content) }}</textarea>
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">E-posta</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $staff->email) }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Facebook URL</label>
                    <input type="url" class="form-control" name="facebook_url" value="{{ old('facebook_url', $staff->facebook_url) }}" placeholder="https://facebook.com/...">
                    <span class="text-danger">{{ $errors->first('facebook_url') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Twitter URL</label>
                    <input type="url" class="form-control" name="twitter_url" value="{{ old('twitter_url', $staff->twitter_url) }}" placeholder="https://twitter.com/...">
                    <span class="text-danger">{{ $errors->first('twitter_url') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Instagram URL</label>
                    <input type="url" class="form-control" name="instagram_url" value="{{ old('instagram_url', $staff->instagram_url) }}" placeholder="https://instagram.com/...">
                    <span class="text-danger">{{ $errors->first('instagram_url') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords', $staff->meta_keywords) }}">
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $staff->meta_description) }}</textarea>
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Sıra</label>
                    <input type="number" class="form-control" name="order" min="0" value="{{ old('order', $staff->order) }}">
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Aktif mi?</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active', $staff->is_active) ? 'checked' : '' }}>
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                </div>

                <button type="submit" class="btn btn-success">Kaydet</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#content',
            height: 400,
            language: 'tr',
            license_key: "gpl",
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
            toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px; }',
        });

        $("#currentImage").on('click', function() {
            const imageUrl = $(this).attr('src');
            Swal.fire({
                imageUrl: imageUrl,
                confirmButtonText: 'Kapat',
                width: 800,
                showCloseButton: false
            });
        });

        $('#imageInput').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    if ($('#currentImage').length) {
                        $('#currentImage').attr('src', e.target.result);
                    } else {
                        $('<div class="mb-2"><img id="currentImage" src="' + e.target.result + '" style="width:120px;height:auto;border-radius:4px;cursor:pointer;" alt="Önizleme"></div>').insertBefore('#imageInput');
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
