@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('notice.add') }}" class="btn btn-primary">Yeni Duyuru Ekle</a>
    </div>

    <table id="noticeTable" class="table-responsive table">
        <thead>
            <tr>
                <th>Sıra</th>
                <th>Duyuru Adı</th>
                <th>Duyuru Resmi</th>
                <th>Durum</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#noticeTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('notice') }}',
                columns: [{
                        data: 'order',
                        name: 'order'
                    },

                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false,

                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>

    <script>
        $(document).on('click', '.preview-image-btn', function() {

            let imageUrl = $(this).data('image');
            let title = $(this).data('title');

            Swal.fire({
                imageUrl: imageUrl,
                confirmButtonText: 'Kapat',
                width: 800,
                showCloseButton: false
            });

        });
    </script>
@endsection
