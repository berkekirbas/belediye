@extends('layouts.app.app')

@section('content')

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Anasayfa Modül Ayarları</h3>
            </div>
            <form class="card-body" action="{{ route('module.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group mb-3 col-md-3"><label class="form-label">Anasayfa Etkinlik Alanı</label></div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input" name="activity_status" value="1" {{ $module->activity_status ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-3"><label class="form-label">Anasayfa Duyurular Alanı</label></div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input" name="notice_status" value="1" {{ $module->notice_status ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-3"><label class="form-label">Anasayfa Son Projeler Alanı</label></div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input" name="project_status" value="1" {{ $module->project_status ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-3"><label class="form-label">Anasayfa Başkan Alanı</label></div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input" name="baskan_status" value="1" {{ $module->baskan_status ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-3"><label class="form-label">Anasayfa Başkan Mesajlar Alanı</label></div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input" name="baskanmessage_status" value="1" {{ $module->baskanmessage_status ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-3"><label class="form-label">Anasayfa Foto Galeri Alanı</label></div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input" name="photo_status" value="1" {{ $module->photo_status ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-3"><label class="form-label">Anasayfa İletişim Formu Alanı</label></div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input" name="contactform_status" value="1" {{ $module->contactform_status ? 'checked' : '' }}>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Güncelle</button>

            </form>
        </div>
    </div>
@endsection
