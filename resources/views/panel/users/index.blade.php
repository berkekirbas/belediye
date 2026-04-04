@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('users.add') }}" class="btn btn-primary">Yeni Yönetici Ekle</a>
    </div>

    <table id="usersTable" class="table-responsive table">
        <thead>
            <tr>
                <th>Adı</th>
                <th>Soyadı</th>
                <th>E-Mail</th>
                <th>Yetki Grubu</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sayfa verileri buraya eklenecek -->
        </tbody>
    </table>
@endsection

@section('js')
    {{-- yajra ile datatable --}}

    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('users') }}',
                columns: [{
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'roles',
                        name: 'roles',
                        render: function(data, type, row) {
                            if (data.length > 0) {
                                return data.map(role => role.name).join(', ');
                            } else {
                                return 'Rol Atanmamış';
                            }
                        }
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
