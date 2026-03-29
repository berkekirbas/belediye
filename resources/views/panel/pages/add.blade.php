@extends('layouts.app.app')

@section('content')


    <div class="col-12 mb-4">
        <a href="{{ route('pages') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>


    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Yeni Sayfa Ekle</h3>
            </div>
            <form class="card-body">
                <div class="form-group mb-3">
                    <label class="form-label">Sayfa Adı</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Sayfa Meta(Max 70 Karakter)</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Sayfa Açıklama(Description)</label>
                    <textarea class="form-control" name=""></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Sayfa Resmi</label>
                    <input type="file" class="form-control file-input" name="">
                </div><br>
                <div class="form-group mb-3">
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" name="" checked>
                        <span class="form-check-label">Sayfa Durumu</span>
                    </label>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Sayfa İçeriği</label>
                    <textarea class="form-control" name=""></textarea>
                </div>

                <button type="submit" class="btn btn-success">Kaydet</button>

            </form>
        </div>
    </div>

@endsection
