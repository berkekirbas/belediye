@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('photo.add') }}" class="btn btn-primary">Yeni Albüm Ekle</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Foto Galeri Listesi</h5>
        </div>
        <div class="card-body">
            <table id="photoGalleryTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Albüm Adı</th>
                        <th>Kapak Resmi</th>
                        <th>Fotoğraf Sayısı</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#photoGalleryTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('photo') }}',
                columns: [
                    { data: 'order', name: 'order' },
                    { data: 'title', name: 'title' },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'photo_count', name: 'photo_count', orderable: false, searchable: false },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>

    <script>
        $(document).on('click', '.preview-image-btn', function() {
            let imageUrl = $(this).data('image');
            Swal.fire({
                imageUrl: imageUrl,
                confirmButtonText: 'Kapat',
                width: 800,
                showCloseButton: false
            });
        });
    </script>
@endsection
