@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('mainmenu.add') }}" class="btn btn-primary">Yeni Menü Ekle</a>
    </div>

    <table id="mainMenuTable" class="table-responsive table">
        <thead>
            <tr>
                <th>Menü Adı</th>
                <th>Menü Url</th>
                <th>Sıra</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <!-- Menü verileri buraya eklenecek -->
        </tbody>
    </table>
@endsection

@section('js')
    {{-- yajra ile datatable --}}

    <script>
        $(document).ready(function() {
            $('#mainMenuTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('mainmenu') }}',
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
