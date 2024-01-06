<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mahasiswa STMIK Madira Indonesia | @yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <script type="tekt/javascript" src="{{ asset('assets') }}/js/jqury-3.2.1.min.js"></script>
        <script type="tekt/javascript" src="{{ asset('assets') }}/js/bootstrap.js"></script>
        <script src="https://ajax.googleapis.com//ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>

    <body>
        <div class="container" style="background:#f8f9fa">
            <div class="alert alert-into text-center">
                <h4><b>Selamat Datang</b> Di Mahasiswa STMIK</h4>
            </div>
            <div>
                @include('menu')
                @include('konten')
                @include('footer')
            </div>
        </div>
    </body>
</html>