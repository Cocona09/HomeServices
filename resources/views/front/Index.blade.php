<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ServiceNest - Your go-to platform for home services">
    <meta name="keywords" content="home services, service providers, tasks">
    <title>ServiceNest</title>
    <link rel="stylesheet" href="{{ asset('css/Index.css') }}"/>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css"/>
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
  <div>
      @include('layouts.frontend.header')
      @yield('content')
      @include('layouts.frontend.footer')
  </div>

<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/index.js')}}"></script>
</body>
</html>
