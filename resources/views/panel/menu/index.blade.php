@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('mainmenu.add') }}" class="btn btn-primary">Yeni Menü Ekle</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Ana Menü Listesi</h5>
        </div>
        <div class="card-body">
            <table id="mainMenuTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Menü Adı</th>
                        <th>Menü Url</th>
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
            $('#mainMenuTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('mainmenu') }}',
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
