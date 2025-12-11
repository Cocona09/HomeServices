<link rel="stylesheet" href="{{asset("css/Register.css")}}"/>
@extends('front.Index')

@section('content')
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-box">
            <form method="POST" action="{{ route('register') }}" class="Rform">
                @csrf

                <!-- Form Title -->
                <div class="create">
                    <h1 class="form-title">Create Your Account</h1>
                </div>

                <!-- Name -->
                <div class="input-group">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Нэр" required
                           autofocus class="inputField"/>
                    @if ($errors->has('name'))
                        <div class="error-message">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <!-- Email Address -->
                <div class="input-group">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Имайл" required
                           class="inputField"/>
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

                <!-- Confirm Password -->
                <div class="input-group">
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           placeholder="Нууц үгээ баталгаажуулна уу" required class="inputField"/>
                    @if ($errors->has('password_confirmation'))
                        <div class="error-message">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>

                <!-- Buttons and Links -->
                <div class="button-group">
                    <a href="{{ route('login') }}" class="link">Аль хэдийн бүртгүүлсэн үү?</a>

                    <button type="submit" class="btnPrimary">Бүртгүүлэх</button>
                </div>
            </form>
        </div>
@endsection
