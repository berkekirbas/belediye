@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('footermenu.add') }}" class="btn btn-primary">Yeni Footer Menü Ekle</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Footer Menü Listesi</h5>
        </div>
        <div class="card-body">
            <table id="footerMenuTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Footer Menü Adı</th>
                        <th>Footer Menü Url</th>
                        <th>Sıra</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    {{-- yajra ile datatable --}}

    <script>
        $(document).ready(function() {
            $('#footerMenuTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('footermenu') }}',
                ordering: false,
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'url',
                        name: 'url'
                    },
                    {
                        data: 'order',
                        name: 'order'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            })
        });
    </script>
@endsection
