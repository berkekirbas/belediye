@extends('layouts.app.app')

@section('content')
    <div class="w-100">
        <div class="row">

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <a href="{{ route('pages.add') }}" class="btn btn-primary btn-lg">Yeni Sayfa Ekle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <button class="btn btn-primary btn-lg">Yeni Hizmet Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <button class="btn btn-primary btn-lg">Yeni Etkinlik Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <button class="btn btn-primary btn-lg">Yeni Duyuru Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <button class="btn btn-primary btn-lg">Yeni Proje Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <button class="btn btn-primary btn-lg">Yeni Haber Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <button class="btn btn-primary btn-lg">Yeni Foto Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
            @if (Sentinel::inRole('admin'))
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <button class="btn btn-primary btn-lg">Yönetici Ayarları</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <button class="btn btn-primary btn-lg">Menu Ayarları</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <button class="btn btn-primary btn-lg">Footer Menu Ayarları</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <button class="btn btn-primary btn-lg">Limit Ayarları</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <button class="btn btn-primary btn-lg">Anasayfa Modul Ayarları</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <button class="btn btn-primary btn-lg">Tema Renk Ayarları</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <button class="btn btn-primary btn-lg">Site Ayarları</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <button class="btn btn-danger btn-lg">Çıkış Yap</button>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
