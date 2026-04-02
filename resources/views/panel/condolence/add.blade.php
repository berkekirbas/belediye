@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('condolence') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>


    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Yeni Taziye & Başsağlığı Ekle</h3>
            </div>
            <form class="card-body" action="{{ route('condolence.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Adı & Soyadı</label>
                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">
                    <span class="text-danger">{{ $errors->first('fullname') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Görevi</label>
                    <input type="text" class="form-control" name="job" value="{{ old('job') }}">
                    <span class="text-danger">{{ $errors->first('job') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Durumu</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active') ? 'checked' : '' }}>
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Mesaj</label>
                    <textarea class="form-control" name="message" rows="4">{{ old('message') }}</textarea>
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                </div>


                <button type="submit" class="btn btn-success">Kaydet</button>

            </form>
        </div>
    </div>
@endsection
