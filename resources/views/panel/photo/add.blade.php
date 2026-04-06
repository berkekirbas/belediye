@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('photo') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Yeni Albüm Ekle</h3>
            </div>
            <form class="card-body" action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Albüm Adı</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Açıklama</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Kapak Görseli</label>
                    <input type="file" class="form-control" name="image" id="coverInput"
                        accept="image/jpeg,image/png,image/webp,image/gif">
                    <div id="coverPreview" class="mt-2"></div>
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Albüm Fotoğrafları (Çoklu Seçim)</label>
                    <input type="file" class="form-control" name="photos[]" id="photosInput" multiple
                        accept="image/jpeg,image/png,image/webp,image/gif">
                    <div id="photosPreview" class="row mt-2"></div>
                    <span class="text-danger">{{ $errors->first('photos.*') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords') }}">
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description') }}</textarea>
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Sıra</label>
                    <input type="number" class="form-control" name="order" min="0" value="{{ old('order', 0) }}">
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Aktif mi?</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active', true) ? 'checked' : '' }}>
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

        $('#coverInput').on('change', function() {
            $('#coverPreview').empty();
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#coverPreview').html(
                        '<img src="' + e.target.result + '" style="width:120px;height:auto;border-radius:4px;">'
                    );
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        $('#photosInput').on('change', function() {
            $('#photosPreview').empty();
            if (this.files) {
                Array.from(this.files).forEach(function(file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#photosPreview').append(
                            '<div class="col-md-3 col-sm-4 col-6 mb-2 text-center">' +
                                '<img src="' + e.target.result + '" style="width:100%;height:120px;object-fit:cover;border-radius:4px;">' +
                            '</div>'
                        );
                    };
                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
@endsection
