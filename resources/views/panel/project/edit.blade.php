@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('project') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Proje Düzenle</h3>
            </div>
            <form class="card-body" action="{{ route('project.update', $project->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Proje Adı</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ old('title', $translation->title ?? '') }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Proje Kategorisi</label>
                    <select name="project_category_id" class="form-control">
                        <option value="">-- Kategori Seçin --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('project_category_id', $project->project_category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('project_category_id') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Proje İçeriği</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content', $translation->content ?? '') }}</textarea>
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Kapak Görseli</label>
                    @if ($project->image)
                        <div class="mb-2">
                            <img src="{{ $project->image_url }}"
                                style="width:120px;height:auto;border-radius:4px;cursor:pointer;" alt="Kapak Görseli"
                                id="currentImage">
                        </div>
                    @endif
                    <input type="file" class="form-control" name="image" id="coverInput"
                        accept="image/jpeg,image/png,image/webp,image/gif">
                    <div id="coverPreview" class="mt-2"></div>
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Mevcut Proje Fotoğrafları</label>
                    @if ($project->images->count() > 0)
                        <div class="row" id="projectImages">
                            @foreach ($project->images as $img)
                                <div class="col-md-3 col-sm-4 col-6 mb-3 text-center" id="image-{{ $img->id }}">
                                    <img src="{{ $img->image_url }}"
                                        style="width:100%;height:120px;object-fit:cover;border-radius:4px;cursor:pointer;"
                                        class="mb-1 preview-gallery-image" data-image="{{ $img->image_url }}">
                                    <br>
                                    <button type="button" class="btn btn-danger btn-sm mt-1 delete-image-btn"
                                        data-id="{{ $img->id }}">Sil</button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Henüz fotoğraf eklenmemiş.</p>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Yeni Fotoğraf Ekle (Çoklu Seçim)</label>
                    <input type="file" class="form-control" name="photos[]" id="photosInput" multiple
                        accept="image/jpeg,image/png,image/webp,image/gif">
                    <div id="photosPreview" class="row mt-2"></div>
                    <span class="text-danger">{{ $errors->first('photos.*') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords"
                        value="{{ old('meta_keywords', $translation->meta_keywords ?? '') }}">
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control"
                        rows="3">{{ old('meta_description', $translation->meta_description ?? '') }}</textarea>
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Sıra</label>
                    <input type="number" class="form-control" name="order" min="0"
                        value="{{ old('order', $project->order) }}">
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Aktif mi?</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
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

        $(document).on('click', '.preview-gallery-image', function() {
            const imageUrl = $(this).data('image');
            Swal.fire({
                imageUrl: imageUrl,
                confirmButtonText: 'Kapat',
                width: 800,
                showCloseButton: false
            });
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

        $(document).on('click', '.delete-image-btn', function() {
            const imageId = $(this).data('id');
            const card = $('#image-' + imageId);

            Swal.fire({
                title: 'Emin misiniz?',
                text: 'Bu fotoğrafı silmek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, Sil',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/panel/project/image/' + imageId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                card.fadeOut(300, function() { $(this).remove(); });
                                Swal.fire('Silindi!', response.message, 'success');
                            }
                        },
                        error: function() {
                            Swal.fire('Hata!', 'Fotoğraf silinirken bir hata oluştu.', 'error');
                        }
                    });
                }
            });
        });
    </script>
@endsection
