@extends('layouts.app.app')

@section('content')
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Tema Renk Ayarları</h3>
            </div>
            <form class="card-body" action="{{ route('theme.update') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Renk 1</label>
                    <input type="text" class="form-control" name="color1" value="{{ $theme->color1 }}">
                    <span class="text-danger">{{ $errors->first('color1') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Renk 2</label>
                    <input type="text" class="form-control" name="color2" value="{{ $theme->color2 }}">
                    <span class="text-danger">{{ $errors->first('color2') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Renk 3</label>
                    <input type="text" class="form-control" name="color3" value="{{ $theme->color3 }}">
                    <span class="text-danger">{{ $errors->first('color3') }}</span>
                </div>

                <button type="submit" class="btn btn-success">Güncelle</button>

            </form>
        </div>
    </div>
@endsection
