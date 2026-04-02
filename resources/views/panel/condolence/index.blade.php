@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('condolence.add') }}" class="btn btn-primary">Yeni Taziye & Başsağlığı Ekle</a>
    </div>

    <table id="condolenceTable" class="table-responsive table">
        <thead>
            <tr>
                <th>Ad & Soyad</th>
                <th>Meslek</th>
                <th>Durum</th>
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
            $('#condolenceTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('condolence') }}',
                columns: [{
                        data: 'fullname',
                        name: 'fullname'
                    },
                    {
                        data: 'job',
                        name: 'job'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
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
