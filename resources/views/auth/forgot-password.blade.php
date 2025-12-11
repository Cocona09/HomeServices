<link rel="stylesheet" href="{{asset("css/forgotPassword.css")}}"/>
<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <img src="{{ asset('uploads/images/logo.png') }}" class="logoimg">
                    <h1><a href="{{route('main-content.content')}}" class="serviceNest">ServiceNest</a></h1>
                </div>
            </div>
            <div class="col-md-9">
                <nav class="menuitems">
                    <ul class="d-flex justify-content-end">
                        <li><a href="#" class="Sbtn">Become a Service Pro</a></li>
                        <li><a href="#" class="service">Services</a></li>
                        <li>
                            @if (Route::has('login'))
                                <div class="loginP text-end">
                                    @auth
                                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}">Sign up / Log in</a>
                                    @endauth
                                </div>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="line"></div>
</header>
<x-guest-layout>
    <!-- Instruction Message -->


    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <div class="form-box">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4 text-md text-gray-600 dark:text-gray-400">
                {{ __('Нууц үгээ мартсан уу? Асуудалгүй. Зүгээр л бидэнд имэйл хаягаа мэдэгдээрэй, бид танд нууц үг шинэчлэх холбоосыг имэйлээр илгээх бөгөөд энэ нь танд шинийг сонгох боломжийг олгоно.') }}
            </div>
            <!-- Email Address -->
            <div class="input-group">
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Имайл" required autofocus class="inputField" />
                @if ($errors->has('email'))
                    <div class="error-message">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="button-group">
                <button type="submit" class="btnPrimary">Имэйл нууц үг шинэчлэх</button>
            </div>
        </form>
    </div>
</x-guest-layout>
