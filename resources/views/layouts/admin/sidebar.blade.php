<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="sidebar">
    <div class="side-brand">
        <div class="brand-flex">
            <a href="{{route('main-content.content')}}"><img src="{{asset('uploads/images/logo.png')}}" width="65px" height="65px"></a>

            <div class="brand-icons">
                <span class="las la-bell"></span>
                <span class="las la-user-circle"></span>
            </div>
        </div>
    </div>

    <div class="sidebar-main">
        <div class="sidebar-user">
            <img src="{{asset('uploads/images/profile.jpg')}}" alt="">
            <div class="user-info">
                <h3>Баттөр Ананд</h3>
                <span>Anand@gmail.com</span>
            </div>
        </div>

        <div class="sidebar-menu">
            <!-- Dashboard Menu -->
            <div class="menu-head">
                <div>
                    <span>Dashboard</span>
                </div>
                <ul>
                    <li>
                        <a href="{{route('serviceCrud.mainService')}}">
                            <span class="las la-balance-scale"></span>
                            Үйлчилгээ
                        </a>
                        <a href="{{route('dashboard')}}">
                            <span class="las la-chart-pie"></span>
                            Аналитик
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Application Menu -->
            <div class="menu-head">
                <div>
                    <span>Clients</span>
                </div>
                <ul>
                    <li>
                        <a href="{{route('userCrud.userDisplay')}}">
                            <span class="las la-user"></span>
                            Хэрэглэгч
                        </a>

                        <a href="{{route('orderCrud.orderDisplay')}}">
                            <span class="las la-shopping-cart"></span>
                            Захиалга
                        </a>
                        <a href="{{route('workerCrud.workerDisplay')}}">
                            <span class="las la-users"></span>
                            Ажилчид
                        </a>
                        <a href="{{route('applicationJob.applicationDisplay')}}">
                            <span class="las la-comment"></span>
                            Ажлын хүсэлт
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
