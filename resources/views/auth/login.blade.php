
<link rel="stylesheet" href="{{ asset('css/Login.css') }}"/>

@extends('front.Index')

@section('content')
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-box">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Form Title -->
                <div class="welcome">
                    <h1 class="form-title">Welcome Back!</h1>
                </div>
                <!-- Email Address -->
                <div class="input-group">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Имэйл" required
                           autofocus class="inputField"/>
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Password -->
                <div class="input-group">
                    <input id="password" type="password" name="password" placeholder="Нууц үг" required
                           class="inputField"/>
                    @if ($errors->has('password'))
                        <div class="error-message">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="checkbox-group">
                    <label for="remember_me"></label>
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Намайг сана</span>
                </div>

                <!-- Buttons and Links -->
                <div class="button-group">


                    <button type="submit" class="btnPrimary">Нэвтрэх</button>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btnSecondary">Бүртгүүлэх</a>
                    @endif
                </div>
                <div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="link">Нууц үгээ мартсан уу?</a>
                    @endif
                </div>
            </form>
        </div>

@endsection
