@extends('layouts.app.app')

@section('content')


    <div class="col-12 mb-4">
        <a href="{{ route('users') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>


    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Yeni Yönetici Ekle</h3>
            </div>
            <form class="card-body">
                <div class="form-group mb-3">
                    <label class="form-label">Adı Soyadı</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">E-Mail</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Şifre</label>
                    <input type="password" class="form-control" name="">
                </div>
                <br>
                <div class="form-group mb-3">
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" name="" checked>
                        <span class="form-check-label">Durumu</span>
                    </label>
                </div>
                <div class="row mb-3">
                    <div class="form-group mb-3 col-6 col-md-6">
                        <label class="form-label">Avatar</label>
                        <input type="file" class="form-control file-input" name="">
                    </div>
                    <div class="form-group mb-3 col-6 col-md-6">
                        <label class="form-label">Yetki</label>
                        <select class="form-control" name="">
                            <option value="">Seçiniz</option>
                            <option value="1">Admin</option>
                            <option value="2">Editör</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Kaydet</button>

            </form>
        </div>
    </div>

@endsection
