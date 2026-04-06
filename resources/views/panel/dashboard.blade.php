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
                            <a href="{{ route('activity.add') }}" class="btn btn-primary btn-lg">Yeni Etkinlik Ekle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <a href="{{ route('notice.add') }}" class="btn btn-primary btn-lg">Yeni Duyuru Ekle</a>
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
                                <a href="{{ route('users') }}" class="btn btn-primary btn-lg">Yönetici Ayarları</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <a href="{{ route('mainmenu') }}" class="btn btn-primary btn-lg">Menu Ayarları</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <a href="{{ route('footermenu') }}" class="btn btn-primary btn-lg">Footer Menu Ayarları</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <a href="{{ route('limit') }}" class="btn btn-primary btn-lg">Limit Ayarları</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <a href="{{ route('module') }}" class="btn btn-primary btn-lg">Anasayfa Modul Ayarları</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <a href="{{ route('theme') }}" class="btn btn-primary btn-lg">Tema Renk Ayarları</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <a href="{{ route('settings') }}" class="btn btn-primary btn-lg">Site Ayarları</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <a href="{{ route('logout') }}" class="btn btn-danger btn-lg">Çıkış Yap</a>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
