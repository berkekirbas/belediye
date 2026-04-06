@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('project-category.add') }}" class="btn btn-primary">Yeni Proje Kategorisi Ekle</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Proje Kategorisi Listesi</h5>
        </div>
        <div class="card-body">
            <table id="projectCategoryTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Kategori Adı</th>
                        <th>Slug</th>
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
            $('#projectCategoryTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('project-category') }}',
                columns: [
                    { data: 'order', name: 'order' },
                    { data: 'name', name: 'name' },
                    { data: 'slug', name: 'slug' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endsection
