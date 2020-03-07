<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    @include('layouts.seo')

    <!-- CSRF -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Prefetch -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <!-- JS -->
    <script src="{{asset('js/particles.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}" defer></script>
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        
        <div class="container-fluid logo-pager">
            <img src="{{config('app.logo')}}" alt="{{config('app.name', 'Laravel')}}">
        </div>

        <main class="py-3 mb-3 pager">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
