@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('quickmenu.add') }}" class="btn btn-primary">Yeni Hızlı Menü Ekle</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Hızlı Menü Listesi</h5>
        </div>
        <div class="card-body">
            <table id="quickMenuTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Hızlı Menü Adı</th>
                        <th>Hızlı Menü Url</th>
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
            $('#quickMenuTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('quickmenu') }}',
                ordering: false,
                columns: [{
                        data: 'order',
                        name: 'order'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'url',
                        name: 'url'
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
