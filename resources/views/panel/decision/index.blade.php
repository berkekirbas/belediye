@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('decision.add') }}" class="btn btn-primary">Yeni Meclis Kararı Ekle</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Meclis Kararları</h5>
        </div>
        <div class="card-body">
            <table id="decisionTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Meclis Kararı Adı</th>
                        <th>Ay</th>
                        <th>Yıl</th>
                        <th>Dosya</th>
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
            $('#decisionTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('decision') }}',
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'month',
                        name: 'month'
                    },
                    {
                        data: 'year',
                        name: 'year'
                    },
                    {
                        data: 'file',
                        name: 'file'
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


@endsection
