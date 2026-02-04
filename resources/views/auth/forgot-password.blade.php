@extends('front.Index')

@section('title', 'ServiceNest')

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

                    <div class="button-group">
                        <button type="submit" class="btnPrimary">Имэйл нууц үг шинэчлэх</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

