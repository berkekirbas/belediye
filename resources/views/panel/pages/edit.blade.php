@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('pages') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Sayfa Düzenle</h3>
            </div>
            <form class="card-body" action="{{ route('pages.update', $page->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Sayfa Başlığı</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ old('title', $translation->title ?? '') }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug"
                        value="{{ old('slug', $translation->slug ?? '') }}" readonly>
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Sayfa İçeriği</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content', $translation->content ?? '') }}</textarea>
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Sayfa Görseli</label>
                    @if ($page->image)
                        <div class="mb-2">
                            <img src="{{ $page->image_url }}"
                                style="width:120px;height:auto;border-radius:4px; cursor:pointer;" alt="Sayfa Görseli"
                                id="currentImage">
                        </div>
                    @endif
                    <input type="file" class="form-control" name="image"
                        accept="image/jpeg,image/png,image/webp,image/gif">
                    <small class="text-muted">Yeni görsel yüklerseniz mevcut görsel değiştirilir.</small>
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords"
                        value="{{ old('meta_keywords', $translation->meta_keywords ?? '') }}">
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $translation->meta_description ?? '') }}</textarea>
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Sıra</label>
                    <input type="number" class="form-control" name="order" min="0"
                        value="{{ old('order', $page->order) }}">
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Aktif mi?</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active', $page->is_active) ? 'checked' : '' }}>
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

        // Slug otomatik oluşturma
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        let slugManuallyEdited = true; // Edit modunda slug zaten var, manuel sayılsın

        slugInput.addEventListener('input', function() {
            slugManuallyEdited = true;
        });

        titleInput.addEventListener('input', function() {
            if (!slugManuallyEdited) {
                slugInput.value = generateSlug(this.value);
            }
        });

        function generateSlug(text) {
            const turkishMap = {
                'ç': 'c',
                'Ç': 'c',
                'ğ': 'g',
                'Ğ': 'g',
                'ı': 'i',
                'İ': 'i',
                'ö': 'o',
                'Ö': 'o',
                'ş': 's',
                'Ş': 's',
                'ü': 'u',
                'Ü': 'u'
            };

            return text
                .split('')
                .map(char => turkishMap[char] || char)
                .join('')
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
        }

        $("#currentImage").on('click', function() {
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
