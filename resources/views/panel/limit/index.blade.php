@extends('layouts.app.app')

@section('content')

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Limit Ayarları</h3>
            </div>
            <form class="card-body" action="{{ route('limit.update') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Kategorilerde gösterilecek proje sayısı</label>
                    <input type="number" class="form-control" name="project_limit" value="{{ $limit->project_limit }}">
                    <span class="text-danger">{{ $errors->first('project_limit') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Haber sayfasında gösterilecek haber sayısı</label>
                    <input type="number" class="form-control" name="news_limit" value="{{ $limit->news_limit }}">
                    <span class="text-danger">{{ $errors->first('news_limit') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Duyuru sayfasında gösterilecek duyuru sayısı</label>
                    <input type="number" class="form-control" name="notice_limit" value="{{ $limit->notice_limit }}">
                    <span class="text-danger">{{ $errors->first('notice_limit') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Foto galeri sayfasında gösterilecek foto sayısı</label>
                    <input type="number" class="form-control" name="photo_limit" value="{{ $limit->photo_limit }}">
                    <span class="text-danger">{{ $errors->first('photo_limit') }}</span>
                </div>

                <button type="submit" class="btn btn-success">Güncelle</button>

            </form>
        </div>
    </div>
@endsection
