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
                <h3 class="card-title mb-0">Meclis Kararı Düzenle</h3>
            </div>
            <form class="card-body" action="{{ route('decision.update', $decision->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label">Meclis Kararı Adı</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $decision->title ?? '' }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">İlgili Ay</label>
                        <select name="month" id="month" class="form-control">
                            <option {{ $decision->month == 1 ? 'selected' : '' }} value="1">Ocak</option>
                            <option {{ $decision->month == 2 ? 'selected' : '' }} value="2">Şubat</option>
                            <option {{ $decision->month == 3 ? 'selected' : '' }} value="3">Mart</option>
                            <option {{ $decision->month == 4 ? 'selected' : '' }} value="4">Nisan</option>
                            <option {{ $decision->month == 5 ? 'selected' : '' }} value="5">Mayıs</option>
                            <option {{ $decision->month == 6 ? 'selected' : '' }} value="6">Haziran</option>
                            <option {{ $decision->month == 7 ? 'selected' : '' }} value="7">Temmuz</option>
                            <option {{ $decision->month == 8 ? 'selected' : '' }} value="8">Ağustos</option>
                            <option {{ $decision->month == 9 ? 'selected' : '' }} value="9">Eylül</option>
                            <option {{ $decision->month == 10 ? 'selected' : '' }} value="10">Ekim</option>
                            <option {{ $decision->month == 11 ? 'selected' : '' }} value="11">Kasım</option>
                            <option {{ $decision->month == 12 ? 'selected' : '' }} value="12">Aralık</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label">İlgili Yıl</label>
                        <input type="text" class="form-control" name="year" id="year" value="{{ $decision->year ?? '' }}">
                        <span class="text-danger">{{ $errors->first('year') }}</span>
                    </div>
                </div>


                <div class="form-group mb-3">
                    <label class="form-label">Yüklenmiş Dosya : </label>
                     @if ($decision->filename)
                        <a href="{{ $decision->file_url }}" target="_blank" class="mb-2">
                            <img src="{{ asset('assets/tema/PDF_LOGO.png') }}"
                                style="width:60px;height:auto;border-radius:4px; cursor:pointer;"">
                        </a>
                    @endif
                    <input type="file" class="form-control mt-2" name="filename" accept="application/pdf">
                    <span class="text-danger">{{ $errors->first('filename') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Aktif mi?</label>
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        {{ old('is_active', $decision->is_active ?? true) ? 'checked' : '' }}>
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                </div>

                <button type="submit" class="btn btn-success">Güncelle</button>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection
