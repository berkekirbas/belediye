@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('staff.add') }}" class="btn btn-primary">Yeni Personel Ekle</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Personel Listesi</h5>
        </div>
        <div class="card-body">
            <table id="staffTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Ad Soyad</th>
                        <th>Ünvan</th>
                        <th>Grup</th>
                        <th>Resim</th>
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
            $('#staffTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('staff') }}',
                columns: [
                    { data: 'order', name: 'order' },
                    { data: 'full_name', name: 'full_name' },
                    { data: 'title', name: 'title' },
                    { data: 'group', name: 'group' },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
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
