<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi siswa</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.header')
                <div class="main-content">
                    @yield('content')
                </div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>