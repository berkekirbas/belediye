@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('decision') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Yeni Meclis Kararı Ekle</h3>
            </div>
            <form class="card-body" action="{{ route('decision.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Meclis Kararı Adı</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">İlgili Ay</label>
                        <select name="month" id="month" class="form-control">
                            <option {{ old('month') == 1 ? 'selected' : '' }} value="1">Ocak</option>
                            <option {{ old('month') == 2 ? 'selected' : '' }} value="2">Şubat</option>
                            <option {{ old('month') == 3 ? 'selected' : '' }} value="3">Mart</option>
                            <option {{ old('month') == 4 ? 'selected' : '' }} value="4">Nisan</option>
                            <option {{ old('month') == 5 ? 'selected' : '' }} value="5">Mayıs</option>
                            <option {{ old('month') == 6 ? 'selected' : '' }} value="6">Haziran</option>
                            <option {{ old('month') == 7 ? 'selected' : '' }} value="7">Temmuz</option>
                            <option {{ old('month') == 8 ? 'selected' : '' }} value="8">Ağustos</option>
                            <option {{ old('month') == 9 ? 'selected' : '' }} value="9">Eylül</option>
                            <option {{ old('month') == 10 ? 'selected' : '' }} value="10">Ekim</option>
                            <option {{ old('month') == 11 ? 'selected' : '' }} value="11">Kasım</option>
                            <option {{ old('month') == 12 ? 'selected' : '' }} value="12">Aralık</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">İlgili Yıl</label>
                        <input type="text" class="form-control" name="year" id="year" value="{{ old('year') }}">
                        <span class="text-danger">{{ $errors->first('year') }}</span>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Meclis Kararı Dosyası (PDF)</label>
                    <input type="file" class="form-control" name="filename" accept="application/pdf">
                    <span class="text-danger">{{ $errors->first('filename') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Aktif mi?</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active', true) ? 'checked' : '' }}>
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                </div>

                <button type="submit" class="btn btn-success">Kaydet</button>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection
