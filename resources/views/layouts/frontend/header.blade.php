<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
</head>
<body>
<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="logo">
                    <img src="{{asset('uploads/images/logo.png')}}" class="logoimg">
                    <h1><a href="{{route('main-content.content')}}" class="serviceNest">ServiceNest</a></h1>
                </div>
            </div>
            <div class="col-md-8">

                <nav class="menuitems">
                    <ul class="d-flex justify-content-end">
                        <li id="li1"><a href="{{route('servicePro.apply')}}" class="Sbtn">Мэргэлжилтэн болох</a></li>
                        <li id="li2"><a href="{{route('service.contentService') }}" class="service">Үйлчилгээ</a></li>

                        <li>
                            @if (Route::has('login'))
                                <div class="loginP text-end">
                                    @auth
                                        @if($usertype = Auth::user()->usertype)
                                            @if($usertype == 'user')
                                                <a href="{{ url('/dashboard') }}" style="display:none" >Dashboard</a>
                                                <a id="profile1" href="{{route('profile.edit')}}">Профайл</a>
                                            @elseif($usertype == 'admin')
                                                <a id="dashboard1" href="{{ url('/dashboard') }}">Дашбоард</a>
                                            @endif
                                        @endif
                                    @else
                                        <a id="register1" href="{{ route('login') }}">Бүртгүүлэх / Нэвтрэх</a>
                                    @endauth
                                </div>
                            @endif
                        </li>
                        <li><a href="{{route('feedback.feedBackForm')}}"><span class="las la-sms"></span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="line"></div>
</header>

</body>
</html>

