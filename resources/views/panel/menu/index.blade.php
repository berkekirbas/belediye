@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="" class="btn btn-primary">Yeni Menü Ekle</a>
    </div>

    <table class="table-responsive table">
        <thead>
            <tr>
                <th>Menü Adı</th>
                <th>Menü Url</th>
                <th>Sıra</th>
                <th>Alt Menü</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <!-- Menü verileri buraya eklenecek -->
        </tbody>
    </table>
@endsection
