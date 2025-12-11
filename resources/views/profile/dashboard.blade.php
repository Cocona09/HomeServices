<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    maximum-scale=1, minimum-scale=1">
    <title>ServiceNest</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}"/>
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
<input type="checkbox" name="" id="sidebar-toggle">

@include('layouts.admin.sidebar')
<div class="main-content">
    @include('layouts.admin.dashHeader')
    @yield('admin')
</div>

<label for="sidebar-toggle" class="body-label"></label>
</body>
</html>
