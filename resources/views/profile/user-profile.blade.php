<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Management</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
<div class="sidebar-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Profile Settings</h2>
        <a href="{{route('profile.edit')}}" data-section="profile-section">Профайл мэдээлэл</a>
        <a href="{{route('profile.update')}}" data-section="password-section">Нууц үгээ шинэчлэх</a>
        <a href="{{route('profile.destroy')}}" data-section="delete-section">Бүртгэл устгах</a>
        <h2>Client Services</h2>
        <a href="{{ route('profile.userOrder') }}">Миний захиалга</a>

        <div class="logout-container">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Гарах
            </a>
        </div>
    </div>
    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- Main Content -->
    <div class="content">
        <!-- Profile Information Section -->
        <section id="profile-section" class="active">
            <header>
                <h2 class="profile">Профайл мэдээлэл</h2><hr>
                <p class="p1">Профайлын мэдээлэл болон имэйл хаягийг шинэчилнэ үү.</p>

            </header>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div>
                    <label for="name" class="username">Үйлчлүүлэгчийн нэр</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    @if($errors->has('name')) <div class="error">{{ $errors->first('name') }}</div> @endif
                </div>

                <div>
                    <label for="email" class="useremail">Үйлчлүүлэгчийн имэйл</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @if($errors->has('email')) <div class="error">{{ $errors->first('email') }}</div> @endif

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <p>Your email address is unverified.</p>
                        <button form="send-verification">Click here to re-send the verification email.</button>
                        @if (session('status') === 'verification-link-sent')
                            <p>A new verification link has been sent to your email address.</p>
                        @endif
                    @endif
                </div>

                <button type="submit" class="save">Хадгалах</button>
            </form>
        </section>

        <!-- Update Password Section -->
        <section id="password-section">
            <header>
                <h2 class="profile">Нууц үгээ шинэчлэх</h2>
                <hr>
                <p class="p1">Та аккаунтаа хамгаалахын тулд урт нууц үг ашиглах хэрэгтэй.</p>
            </header>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div>
                    <label for="current_password" class="username">Одоогийн нууц үг</label>
                    <input id="current_password" name="current_password" type="password" autocomplete="current-password">
                    @if($errors->updatePassword->has('current_password'))
                        <div class="error">{{ $errors->updatePassword->first('current_password') }}</div>
                    @endif
                </div>

                <div>
                    <label for="password" class="useremail">Шинэ нууц үг</label>
                    <input id="password" name="password" type="password" autocomplete="new-password">
                    @if($errors->updatePassword->has('password'))
                        <div class="error">{{ $errors->updatePassword->first('password') }}</div>
                    @endif
                </div>

                <button type="submit" class="save">Хадгалах</button>
            </form>
        </section>

        <!-- Delete Account Section -->
        <section id="delete-section">
            <header>
                <h2 class="profile">Аккаунт устгах</h2>
                <hr>
                <p class="p1">Таны бүртгэлийг устгасны дараа бүх зүйл бүр мөсөн устах болно.</p>
            </header>

            <button  class="save" onclick="document.getElementById('confirm-user-deletion-modal').style.display='block'">
                Аккаунт устгах
            </button>

            <div id="confirm-user-deletion-modal">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <h2>Та аккаунтаа устгахдаа итгэлтэй байна уу?</h2>
                    <p class="p1">Баталгаажуулахын тулд нууц үгээ оруулна уу.</p>

                    <div>
                        <label for="password" class="pass">Нууц үг</label>
                        <input id="password" name="password" type="password" placeholder="Нууц үг">
                    </div>

                    <button type="button" onclick="document.getElementById('confirm-user-deletion-modal').style.display='none'" class="save">
                        Болих
                    </button>
                    <button type="submit" class="delete">Аккаунт устгах</button>
                </form>
            </div>
        </section>
    </div>
</div>

<script>
    const links = document.querySelectorAll('.sidebar a');
    const sections = document.querySelectorAll('.content section');

    links.forEach(link => {
        link.addEventListener('click', (event) => {
            if (!link.getAttribute('data-section')) {
                return; // Let the link navigate normally.
            }
            event.preventDefault();
            const sectionId = link.getAttribute('data-section');

            sections.forEach(section => {
                section.classList.toggle('active', section.id === sectionId);
            });
        });
    });

</script>

</body>
</html>
