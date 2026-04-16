<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $settings->title }} </title>
    <meta name="description" content="{{ $settings->meta_description }}" />
    <meta name="keywords" content="{{ $settings->meta_keywords ?? 'buyukmandira' }}" />
    <meta property="og:title" content="{{ $settings->title }}" />
    <meta property="og:description" content="{{ $settings->meta_description }}" />
    <meta property="og:image" content="/storage/settings/{{ $settings->logo }}" />
    <meta name="author" content="{{ $settings->title }}" />
    <meta name="Abstract" content="{{ $settings->title }}" />
    <meta name="Copyright" content="{{ $settings->copyright }}" />
    <link rel="shortcut icon" href="/storage/settings/{{ $settings->favicon }}" type="image/x-icon">
    <!--bootstrap css 4.0-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Titillium+Web:400,600&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <!-- notify CSS ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/swiper.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/zabuto_calendar.css') }}">
    <link href="{{ asset('assets/js/fancybox/jquery.fancybox.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/owl/owl.carousel-2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl/owl.theme-2.css') }}" rel="stylesheet">

    <style>
        :root {
            --color1: {{ $theme->color1 }};
            --color2: {{ $theme->color2 }};
            --color3: {{ $theme->color3 }};
            --color1-ad: {{ $theme->color1 }}ad;
            --color1-d6: {{ $theme->color1 }}d6;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
    <script src="{{ asset('assets/js/jquery.min.front.js') }}" type="text/javascript"></script>
</head>

<body>
    @include('front.partial.navup')

    @include('front.partial.navbar')

    @yield('content')

    @include('front.partial.footer')




    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>


    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/fancybox/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/grid.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            Grid.init();
        });
    </script>

    <script src="{{ asset('assets/js/zabuto_calendar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/owl/owl.carousel-2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
    <!-- notify js
 ============================================ -->
    <script src="{{ asset('assets/js/jquery.core.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/notifyjs/dist/notify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/notifications/notify-metro.js') }}" type="text/javascript"></script>




</body>

</html>
