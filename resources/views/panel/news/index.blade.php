@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('news.add') }}" class="btn btn-primary">Yeni Haber Ekle</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Haber Listesi</h5>
        </div>
        <div class="card-body">
            <table id="newsTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Haber Adı</th>
                        <th>Kapak Resmi</th>
                        <th>Durum</th>
                        <th>Manşet</th>
                        <th>Anasayfa</th>
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
            $('#newsTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('news') }}',
                columns: [
                    { data: 'order', name: 'order' },
                    { data: 'title', name: 'title' },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'status', name: 'status' },
                    { data: 'is_headline', name: 'is_headline' },
                    { data: 'is_homepage', name: 'is_homepage' },
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
