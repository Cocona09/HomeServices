<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<header class="sticky-top">
    <div class="container-fluid px-3 px-md-4 px-lg-5">
        <div class="row align-items-center py-2">
            <!-- Brand Title Section -->
            <div class="col-6 col-lg-4">
                <h1 class="brand-title mb-0">
                    <a href="{{ route('main-content.content') }}" class="text-decoration-none">ServiceNest</a>
                </h1>
            </div>

            <!-- Navigation Section -->
            <div class="col-6 col-lg-8 d-flex justify-content-end">
                <!-- Mobile Menu Toggle Button -->
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mobileNavbar" aria-controls="mobileNavbar"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Desktop Navigation - ALWAYS ON RIGHT -->
                <nav class="navbar navbar-expand-md p-0 d-none d-lg-block">
                    <div class="navbar-collapse justify-content-end">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item me-1">
                                <a href="{{ route('servicePro.apply') }}" class="apply nav-link px-3 py-2">
                                    Мэргэлжилтэн болох
                                </a>
                            </li>
                            <li class="nav-item me-1">
                                <a href="{{ route('service.contentService') }}" class="service nav-link px-3">
                                    Үйлчилгээ
                                </a>
                            </li>
                            <li class="nav-item me-1">
                                <a href="{{route('about.aboutUs')}}" class="service nav-link px-3">
                                    Бидний тухай
                                </a>
                            </li>

                            <!-- Auth Links -->
                            <li class="nav-item me-1">
                                @if (Route::has('login'))
                                    <div>
                                        @auth
                                            @if($usertype = Auth::user()->usertype)
                                                @if($usertype == 'user')
                                                    <a id="profile1" href="{{ route('profile.edit') }}" class="loginNav nav-link px-3">
                                                        Профайл
                                                    </a>
                                                @elseif($usertype == 'admin')
                                                    <a id="dashboard1" href="{{ url('/dashboard') }}" class="loginNav nav-link px-3">
                                                        Дашбоард
                                                    </a>
                                                @endif
                                            @endif
                                        @else
                                            <a id="register1" href="{{ route('login') }}" class="loginNav nav-link px-3">
                                                Бүртгүүлэх / Нэвтрэх
                                            </a>
                                        @endauth
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col-12">
                <div class="collapse navbar-collapse d-lg-none" id="mobileNavbar">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item mb-2">
                            <a href="{{ route('servicePro.apply') }}" class="apply nav-link px-3 py-2 text-center">
                                Мэргэлжилтэн болох
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('service.contentService') }}" class="service nav-link px-3 py-2 text-center">
                                Үйлчилгээ
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{route('about.aboutUs')}}" class="service nav-link px-3 py-2 text-center">
                                Бидний тухай
                            </a>
                        </li>

                        <!-- Auth Links -->
                        <li class="nav-item mb-2">
                            @if (Route::has('login'))
                                <div class="text-center">
                                    @auth
                                        @if($usertype = Auth::user()->usertype)
                                            @if($usertype == 'user')
                                                <a id="profile1" href="{{ route('profile.edit') }}" class="loginNav nav-link px-3 py-2">
                                                    Профайл
                                                </a>
                                            @elseif($usertype == 'admin')
                                                <a id="dashboard1" href="{{ url('/dashboard') }}" class="loginNav nav-link px-3 py-2">
                                                    Дашбоард
                                                </a>
                                            @endif
                                        @endif
                                    @else
                                        <a id="register1" href="{{ route('login') }}" class="loginNav nav-link px-3 py-2">
                                            Бүртгүүлэх / Нэвтрэх
                                        </a>
                                    @endauth
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
