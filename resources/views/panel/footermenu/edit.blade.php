@extends('layouts.app.app')

@section('content')
    <div class="col-12 mb-4">
        <a href="{{ route('footermenu') }}" class="btn btn-info">
            <i class="align-middle" data-feather="arrow-left"></i>
            Geri Dön
        </a>
    </div>


    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Footer Menü Düzenle</h3>
            </div>
            <form class="card-body" action="{{ route('footermenu.update', $menu->id) }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Üst Menü</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="-1"
                            {{ is_null(old('parent_id', $menu->parent_id)) || old('parent_id', $menu->parent_id) == -1 ? 'selected' : '' }}>
                            Üst Menü Yok (Ana Menü)</option>
                        @foreach ($menuTree as $item)
                            <option value="{{ $item['id'] }}"
                                {{ old('parent_id', $menu->parent_id) == $item['id'] ? 'selected' : '' }}>
                                {{ str_repeat('—', $item['level']) }}{{ $item['level'] > 0 ? ' ' : '' }}{{ $item['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Footer Menü Adı</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $menu->name) }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Sayfa Seçin</label>
                    <select name="page_id" id="page_id" class="form-control">
                        <option value="">Sayfa Seçilmedi (Manuel URL)</option>
                        @foreach ($pages as $p)
                            @php $pt = $p->translation('tr'); @endphp
                            @if ($pt)
                                <option value="{{ $p->id }}" data-slug="{{ $pt->slug }}"
                                    {{ old('page_id', $menu->page_id) == $p->id ? 'selected' : '' }}>
                                    {{ $pt->title }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Footer Menü Url</label>
                    <input type="text" class="form-control" name="url" id="url"
                        value="{{ old('url', $menu->url) }}">
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Footer Menü Sırası</label>
                    <input type="number" class="form-control" name="order" min="0"
                        value="{{ old('order', $menu->order) }}">
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Footer Menü Sırası</label>
                    <select name="open_type" id="open_type" class="form-control"
                        value="{{ old('open_type', $menu->open_type) }}">
                        <option value="_self">Aynı Pencere</option>
                        <option value="_blank">Yeni Pencere</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('open_type') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Footer Menü Aktif mi?</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active', $menu->is_active) ? 'checked' : '' }}>
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                </div>


                <button type="submit" class="btn btn-success">Kaydet</button>

            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('page_id').addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            const slug = selected.getAttribute('data-slug');
            if (slug) {
                document.getElementById('url').value = '/' + slug;
            }
        });
    </script>
@endsection
