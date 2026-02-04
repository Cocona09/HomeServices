@extends('front.Index')

@section('title', 'ServiceNest - Бүртгүүлэх')

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
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <!-- Form Title -->
                    <div class="create">
                        <h1 class="form-title">Create Your Account</h1>
                        <p class="login-small-text">ServiceNest бүртгэллийн хэсэг</p>
                    </div>

                    <!-- Name -->
                    <div class="input-group">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Нэр" required
                               autofocus autocomplete="name" class="inputField"/>
                        @if ($errors->has('name'))
                            <div class="error-message">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Email Address -->
                    <div class="input-group">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Имэйл" required
                               autocomplete="email" class="inputField"/>
                        @if ($errors->has('email'))
                            <div class="error-message">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <input id="password" type="password" name="password" placeholder="Нууц үг" required
                               autocomplete="new-password" class="inputField"/>
                        @if ($errors->has('password'))
                            <div class="error-message">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-group">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                               placeholder="Нууц үгээ баталгаажуулна уу" required autocomplete="new-password"
                               class="inputField"/>
                        @if ($errors->has('password_confirmation'))
                            <div class="error-message">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <!-- Buttons and Links -->
                    <div class="button-group">
                        <button type="submit" class="btnPrimary" id="registerBtn">Бүртгүүлэх</button>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="link">Аль хэдийн бүртгүүлсэн үү?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('registerForm');
            const registerBtn = document.getElementById('registerBtn');

            registerForm.addEventListener('submit', function(e) {
                // Add loading state
                registerBtn.classList.add('loading');
                registerBtn.innerHTML = '';

                // Password validation
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('password_confirmation').value;

                if (password !== confirmPassword) {
                    e.preventDefault();
                    registerBtn.classList.remove('loading');
                    registerBtn.innerHTML = 'Бүртгүүлэх';
                    alert('Нууц үг таарахгүй байна!');
                }
            });
        });
    </script>
@endsection
