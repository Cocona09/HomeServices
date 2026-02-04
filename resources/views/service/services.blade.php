<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div>
        @include('layouts.frontend.header')
        @yield('contentService')
        @include('layouts.frontend.footer')
    </div>

    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>
