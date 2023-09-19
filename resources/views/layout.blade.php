<!doctype html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{--<link href="./css/bootstrap.min.css" rel="stylesheet">--}}
    
    <link href="{{ asset('/admin/css/icon.css') }}" rel="stylesheet">
    @yield('header_inc')
</head>
<body class="bg-secondary text-white">

    @if (Route::has('login'))

            @auth

            @else
                <script type="text/javascript">location.href = '/login';</script>

            @endauth
    @endif


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-6 bg-secondary bg-gradient text-white border-bottom shadow-sm" style="background: #2d048d; padding: .1rem; max-height: 80px;">
    <img src="../assets/logo.svg" style="color: #fafafa; width: 108px; height: 80px; margin-right:10px;"/>
    <h5 class="my-0 mr-md-auto fw-bold">TAMO</h5>

    <nav class="nav justify-content-end nav-pills" style="width: 80vw;">
        <a class="p-2 text-white nav-link {{ $mainLink }}" href="/start">Pagrindinis</a>
        <a class="p-2 text-white nav-link" href="/test">Testas</a>
        <a class="p-2 text-white nav-link {{ $rezLink }}" href="/rezults">Rezultatai</a>
        <a class="p-2 text-white nav-link {{ $contactLink }}" href="/contacts">Kontaktai</a>
        <img src="../storage/avatar.png" style="width: 32px;height: 32px;"/>
        <a class="p-2 text-white" href="#">{{ Auth::user() ? Auth::user()->name : "Noname" }}</a>

    </nav>


    <a class="btn btn-warning" href="/logout">Išeiti</a>
</div>

<div class="container  mt-5">
    @yield('main_content')
</div>


<script type="text/javascript">
    localStorage.clear();
</script>

</body>
</html>