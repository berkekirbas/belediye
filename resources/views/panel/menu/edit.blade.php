@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('mainmenu') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>


    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Menü Düzenle</h3>
            </div>
            <form class="card-body" action="{{ route('mainmenu.update', $menu->id) }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Ana Menü</label>
                    <select name="parent_id" id="parent_id" class="form-control"
                        value="{{ old('parent_id', $menu->parent_id) }}">
                        <option value="-1" {{ old('parent_id', $menu->parent_id) == -1 ? 'selected' : '' }}>Ana Menü
                        </option>
                        @foreach ($mainMenus as $mainMenu)
                            <option value="{{ $mainMenu->id }}"
                                {{ old('parent_id', $menu->parent_id) == $mainMenu->id ? 'selected' : '' }}>
                                {{ $mainMenu->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Adı</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $menu->name) }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Url</label>
                    <input type="text" class="form-control" name="url" value="{{ old('url', $menu->url) }}">
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Sırası</label>
                    <input type="number" class="form-control" name="order" min="0"
                        value="{{ old('order', $menu->order) }}">
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Sırası</label>
                    <select name="open_type" id="open_type" class="form-control"
                        value="{{ old('open_type', $menu->open_type) }}">
                        <option value="_self">Aynı Pencere</option>
                        <option value="_blank">Yeni Pencere</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('open_type') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Aktif mi?</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active', $menu->is_active) ? 'checked' : '' }}>
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                </div>


                <button type="submit" class="btn btn-success">Kaydet</button>

            </form>
        </div>
    </div>
@endsection
