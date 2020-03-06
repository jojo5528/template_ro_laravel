<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <!-- CHARSET -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <!-- RESPONSIVE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name', 'Laravel')}} - ERROR Exception</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Prefetch -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <!-- JS -->
    <script src="{{ asset('js/particles.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <div class="container-fluid logo-pager">
            <img src="{{config('app.logo')}}" alt="{{config('app.name', 'Laravel')}}">
        </div>

        <main>
            <div class="container-fluid bg-white py-3 rounded px-5">
                <h1 class="text-center"><i class="fas fa-times fa-2x text-danger"></i></h1>
                <h1 class="text-center">WEBSITE ERROR</h1>
                <hr class="border-danger">
                @yield('content')
            </div>
        </main>

        <footer class="page-footer">
            <div class="footer-copyright text-center py-3 text-uppercase">
                <p class="p-0 m-0">
                    {{config('app.name', 'Laravel')}} <i class="fas fa-copyright"></i> 2020 Designed:
                    <a href="https://devkurov.in.th/" target="_blank">Dev-Kurov</a>
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
