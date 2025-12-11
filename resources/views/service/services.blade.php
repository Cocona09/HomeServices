<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest</title>
    <link rel="stylesheet" href="{{asset('css/service.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css"/>
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
