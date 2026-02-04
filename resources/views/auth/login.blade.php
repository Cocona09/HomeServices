@extends('front.Index')

@section('title', 'ServiceNest - Нэвтрэх')

@section('content')
    <div class="auth-container">
        <div class="auth-box">
            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-box">
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf

                    <!-- Form Title -->
                    <div class="welcome">
                        <h1 class="form-title">Welcome Back!</h1>
                        <p class="login-small-text">ServiceNest нэвтрэх хэсэг</p>
                    </div>

                    <!-- Email Address -->
                    <div class="input-group">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Имэйл" required
                               autofocus autocomplete="email" class="inputField"/>
                        @if ($errors->has('email'))
                            <div class="error-message">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <input id="password" type="password" name="password" placeholder="Нууц үг" required
                               autocomplete="current-password" class="inputField"/>
                        @if ($errors->has('password'))
                            <div class="error-message">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <!-- Remember Me -->
                    <div class="checkbox-group">
                        <label for="remember_me">
                            <input id="remember_me" type="checkbox" name="remember">
                        </label>
                        <span>Намайг сана</span>
                    </div>

                    <!-- Buttons and Links -->
                    <div class="button-group">
                        <button type="submit" class="btnPrimary" id="loginBtn">Нэвтрэх</button>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btnSecondary">Бүртгүүлэх</a>
                        @endif
                    </div>

                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="link">Нууц үгээ мартсан уу?</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');

            loginForm.addEventListener('submit', function(e) {
                // Add loading state
                loginBtn.classList.add('loading');
                loginBtn.innerHTML = '';
            });
        });
    </script>
@endsection
