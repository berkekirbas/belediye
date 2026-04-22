<!DOCTYPE html>
<html lang="tr">
@php
    $settings = \App\Models\Settings::first();
@endphp
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Admin Panel || Giriş Yap</title>

    @vite(["resources/css/app.css"])

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.min.front.js') }}" type="text/javascript"></script>

    @if ($settings->recaptcha_project_id && $settings->recaptcha_key)
        <script src="https://www.google.com/recaptcha/api.js?render={{ $settings->recaptcha_key }}"></script>
    @endif

</head>

<body>
	<main class="d-flex w-100">
        @yield('auth_content')
	</main>


	@vite(["resources/js/app.js"])

</body>
</html>

<script>
    $(document).ready(function() {

        @if ($settings->recaptcha_project_id && $settings->recaptcha_key)
             grecaptcha.ready(function() {
                 grecaptcha.execute('{{ $settings->recaptcha_key }}', {
                     action: 'login_form'
                 }).then(function(token) {
                     $('#recaptcha_login').val(token);
                 });
             });
         @endif

    });
</script>
