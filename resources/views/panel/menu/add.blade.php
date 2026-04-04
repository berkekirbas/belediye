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
                <h3 class="card-title mb-0">Yeni Menü Ekle</h3>
            </div>
            <form class="card-body" action="{{ route('mainmenu.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">Üst Menü</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="-1" {{ old('parent_id') == -1 ? 'selected' : '' }}>Üst Menü Yok (Ana Menü)
                        </option>
                        @foreach ($menuTree as $item)
                            <option value="{{ $item['id'] }}" {{ old('parent_id') == $item['id'] ? 'selected' : '' }}>
                                {{ str_repeat('—', $item['level']) }}{{ $item['level'] > 0 ? ' ' : '' }}{{ $item['name'] }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Adı</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                                    {{ old('page_id') == $p->id ? 'selected' : '' }}>
                                    {{ $pt->title }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Url</label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Sırası</label>
                    <input type="number" class="form-control" name="order" min="0" value="{{ old('order') }}">
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Sırası</label>
                    <select name="open_type" id="open_type" class="form-control" value="{{ old('open_type') }}">
                        <option value="_self">Aynı Pencere</option>
                        <option value="_blank">Yeni Pencere</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('open_type') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Menü Aktif mi?</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active') ? 'checked' : '' }}>
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

        $('#page_id').on('change', function() {
            const selected = $(this).find('option:selected');
            const slug = selected.data('data-slug');
            if (slug) {
                $('#url').val('/', slug);
            }
        })
    </script>
@endsection
