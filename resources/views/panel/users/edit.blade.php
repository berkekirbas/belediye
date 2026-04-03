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
                <h3 class="card-title mb-0">Yönetici Düzenle</h3>
            </div>
            <form class="card-body row" method="POST" action="{{ route('users.update', $users->id) }}">
                @csrf
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Adı</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $users->first_name }}">
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Soyadı</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $users->last_name }}">
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">E-Mail</label>
                    <input type="text" class="form-control" name="email" value="{{ $users->email }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Şifre</label>
                    <input type="password" class="form-control" name="password">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Yetki</label>
                    <select class="form-control" name="permissions">
                        <option value="1" {{ $users->permissions == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $users->permissions == 2 ? 'selected' : '' }}>Editör</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('permissions') }}</span>
                </div>


                <button type="submit" class="btn btn-success">Güncelle</button>

            </form>
        </div>
    </div>

@endsection
