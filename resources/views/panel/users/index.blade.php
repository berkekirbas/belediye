@extends('layouts.app.app')

@section('content')


    <div class="col-12 mb-4">
        <a href="{{ route('users.add') }}" class="btn btn-primary">Yeni Yönetici Ekle</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Başlık</th>
                <th>Oluşturulma Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sayfa verileri buraya eklenecek -->
        </tbody>
    </table>


@endsection
