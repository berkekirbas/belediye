@extends('layouts.auth.auth')

@section('auth_content')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Hoşgeldiniz</h1>
                        <p class="lead">
                            Giriş yapmak için lütfen bilgilerinizi giriniz.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form action="{{route('login.post')}}" method="POST">

                                        @if ($errors->any())
                                            <div class="alert alert-danger text-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                    @csrf
                                    <input type="hidden" name="recaptcha" id="recaptcha_login" readonly>
                                    <div class="mb-3">
                                        <label class="form-label">Kullanıcı Adı</label>
                                        <input class="form-control form-control-lg email" type="text" name="username"
                                            placeholder="Kullanıcı adınızı giriniz." />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Şifre</label>
                                        <input class="form-control form-control-lg password" type="password" name="password"
                                            placeholder="Şifrenizi giriniz." />
                                    </div>
                                    <div>
                                        <div class="form-check align-items-center">
                                            <input id="customControlInline" type="checkbox" class="form-check-input"
                                                value="remember-me" name="remember-me" checked>
                                            <label class="form-check-label text-small" for="customControlInline">Beni
                                                Hatırla</label>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary loginBtn">Giriş Yap</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


