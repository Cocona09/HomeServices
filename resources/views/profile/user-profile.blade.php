<!doctype html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest - Профайл тохиргоо</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
@include('layouts.frontend.header')

<div class="profile-page">
    <div class="profile-container">
        <!-- Sidebar -->
        <div class="profile-sidebar">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h3 class="user-name">{{ Auth::user()->name }}</h3>
                <p class="user-email">{{ Auth::user()->email }}</p>
            </div>

            <h2><i class="fas fa-cog"></i> Тохиргоо</h2>
            <a href="#" data-section="profile-section" class="active">
                <i class="fas fa-user"></i> Профайл мэдээлэл
            </a>
            <a href="#" data-section="password-section">
                <i class="fas fa-lock"></i> Нууц үг шинэчлэх
            </a>
            <a href="#" data-section="delete-section">
                <i class="fas fa-trash-alt"></i> Бүртгэл устгах
            </a>

            <h2><i class="fas fa-concierge-bell"></i> Үйлчилгээ</h2>
            <a href="{{ route('profile.userOrder') }}">
                <i class="fas fa-list-alt"></i> Миний захиалга
            </a>
            <a href="{{ route('service.contentService') }}">
                <i class="fas fa-search"></i> Үйлчилгээ хайх
            </a>

            <div class="logout-container">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Гарах
                </a>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <!-- Main Content -->
        <div class="profile-content">
            <!-- Profile Information Section -->
            <section id="profile-section" class="profile-section active">
                <div class="profile-header">
                    <h2>Профайл мэдээлэл</h2>
                    <p>Профайлын мэдээлэл болон имэйл хаягийг шинэчилнэ үү.</p>
                </div>

                <form method="post" action="{{ route('profile.update') }}" class="profile-form">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label for="name">Үйлчлүүлэгчийн нэр</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" placeholder="Нэрээ оруулна уу">
                        @if($errors->has('name'))
                            <div class="error-message">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Үйлчлүүлэгчийн имэйл</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="Имэйлээ оруулна уу">
                        @if($errors->has('email'))
                            <div class="error-message">{{ $errors->first('email') }}</div>
                        @endif

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div class="email-verification">
                                <p class="verification-text">
                                    <i class="fas fa-exclamation-circle"></i> Таны имэйл хаяг баталгаажаагүй байна.
                                </p>
                                <button type="button" class="btn-verify" form="send-verification">
                                    Баталгаажуулах имэйл дахин илгээх
                                </button>
                                @if (session('status') === 'verification-link-sent')
                                    <p class="verification-sent">
                                        <i class="fas fa-check-circle"></i> Шинэ баталгаажуулах холбоос таны имэйл хаяг руу илгээгдлээ.
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="profile-buttons">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save"></i> Хадгалах
                        </button>
                    </div>
                </form>
            </section>

            <!-- Update Password Section -->
            <section id="password-section" class="profile-section">
                <div class="profile-header">
                    <h2>Нууц үг шинэчлэх</h2>
                    <p>Та аккаунтаа хамгаалахын тулд урт нууц үг ашиглах хэрэгтэй.</p>
                </div>

                <form method="post" action="{{ route('password.update') }}" class="profile-form">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="current_password">Одоогийн нууц үг</label>
                        <input id="current_password" name="current_password" type="password" autocomplete="current-password" placeholder="Одоогийн нууц үгээ оруулна уу">
                        @if($errors->updatePassword->has('current_password'))
                            <div class="error-message">{{ $errors->updatePassword->first('current_password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Шинэ нууц үг</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" placeholder="Шинэ нууц үгээ оруулна уу">
                        @if($errors->updatePassword->has('password'))
                            <div class="error-message">{{ $errors->updatePassword->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Шинэ нууц үгээ давтан оруулна уу</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" placeholder="Шинэ нууц үгээ давтан оруулна уу">
                    </div>

                    <div class="profile-buttons">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-lock"></i> Нууц үг шинэчлэх
                        </button>
                    </div>
                </form>
            </section>

            <!-- Delete Account Section -->
            <section id="delete-section" class="profile-section">
                <div class="profile-header">
                    <h2>Аккаунт устгах</h2>
                    <p>Таны бүртгэлийг устгасны дараа бүх мэдээлэл бүр мөсөн устах болно.</p>
                </div>

                <div class="delete-warning">
                    <div class="warning-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="warning-content">
                        <h3>Анхааруулга!</h3>
                        <p>Та аккаунтаа устгахдаа итгэлтэй байна уу? Энэ үйлдлийг буцаах боломжгүй. Таны бүх мэдээлэл, захиалгууд бүр мөсөн устах болно.</p>
                    </div>
                </div>

                <div class="profile-buttons">
                    <button type="button" class="btn-delete" id="openDeleteModal">
                        <i class="fas fa-trash-alt"></i> Аккаунт устгах
                    </button>
                </div>

                <!-- Delete Confirmation Modal -->
                <div class="delete-modal" id="confirmUserDeletionModal">
                    <div class="modal-content">
                        <h2>Та аккаунтаа устгахдаа итгэлтэй байна уу?</h2>
                        <p>Баталгаажуулахын тулд нууц үгээ оруулна уу.</p>

                        <form method="post" action="{{ route('profile.destroy') }}" id="deleteAccountForm">
                            @csrf
                            @method('delete')

                            <div class="form-group">
                                <label for="delete_password">Нууц үг</label>
                                <input id="delete_password" name="password" type="password" placeholder="Нууц үгээ оруулна уу" required>
                                @if($errors->has('password'))
                                    <div class="error-message">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="modal-buttons">
                                <button type="button" class="btn-cancel" id="cancelDelete">
                                    Болих
                                </button>
                                <button type="submit" class="btn-delete">
                                    Аккаунт устгах
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@include('layouts.frontend.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sidebar navigation
        const sidebarLinks = document.querySelectorAll('.profile-sidebar a[data-section]');
        const profileSections = document.querySelectorAll('.profile-section');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const sectionId = this.getAttribute('data-section');

                // Update active link
                sidebarLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');

                // Show selected section
                profileSections.forEach(section => {
                    section.classList.remove('active');
                    if (section.id === sectionId) {
                        section.classList.add('active');
                    }
                });
            });
        });

        // Delete modal functionality
        const deleteModal = document.getElementById('confirmUserDeletionModal');
        const openModalBtn = document.getElementById('openDeleteModal');
        const cancelDeleteBtn = document.getElementById('cancelDelete');

        openModalBtn.addEventListener('click', function() {
            deleteModal.classList.add('active');
        });

        cancelDeleteBtn.addEventListener('click', function() {
            deleteModal.classList.remove('active');
        });

        // Close modal when clicking outside
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                deleteModal.classList.remove('active');
            }
        });

        // Password strength indicator (optional enhancement)
        const passwordInput = document.getElementById('password');
        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                const strengthIndicator = document.getElementById('password-strength') ||
                    (function() {
                        const div = document.createElement('div');
                        div.id = 'password-strength';
                        div.className = 'password-strength';
                        passwordInput.parentNode.appendChild(div);
                        return div;
                    })();

                const password = this.value;
                let strength = 0;

                if (password.length >= 8) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;

                const strengthText = ['Маш сул', 'Сул', 'Дунд', 'Хүчтэй', 'Маш хүчтэй'][strength];
                const strengthColors = ['#e53e3e', '#dd6b20', '#d69e2e', '#38a169', '#2c7a7b'];

                strengthIndicator.innerHTML = `
                    <div class="strength-bar" style="width: ${strength * 25}%; background: ${strengthColors[strength]}"></div>
                    <span style="color: ${strengthColors[strength]}">${strengthText}</span>
                `;
            });
        }

        // Add some CSS for password strength indicator
        const style = document.createElement('style');
        style.textContent = `
            .password-strength {
                margin-top: 10px;
            }
            .strength-bar {
                height: 4px;
                border-radius: 2px;
                margin-bottom: 5px;
                transition: width 0.3s ease;
            }
            .email-verification {
                background: rgba(255, 193, 7, 0.1);
                border-left: 4px solid #ffc107;
                padding: 15px;
                border-radius: 8px;
                margin-top: 15px;
            }
            .verification-text {
                color: #d69e2e;
                margin-bottom: 10px;
            }
            .btn-verify {
                background: #ffc107;
                color: #1a365d;
                border: none;
                padding: 8px 16px;
                border-radius: 6px;
                cursor: pointer;
                font-weight: 600;
                transition: all 0.3s ease;
            }
            .btn-verify:hover {
                background: #e6a500;
                transform: translateY(-2px);
            }
            .verification-sent {
                color: #38a169;
                margin-top: 10px;
                font-size: 0.9rem;
            }
            .delete-warning {
                background: rgba(229, 62, 62, 0.1);
                border-radius: 12px;
                padding: 25px;
                display: flex;
                gap: 20px;
                align-items: center;
                margin-bottom: 30px;
            }
            .warning-icon {
                font-size: 2.5rem;
                color: #e53e3e;
            }
            .warning-content h3 {
                color: #e53e3e;
                margin-bottom: 10px;
            }
            .user-info {
                text-align: center;
                margin-bottom: 30px;
                padding-bottom: 30px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }
            .user-avatar {
                font-size: 4rem;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 15px;
            }
            .user-name {
                font-family: "Montserrat", sans-serif;
                font-weight: 700;
                font-size: 1.4rem;
                margin-bottom: 5px;
            }
            .user-email {
                color: rgba(255, 255, 255, 0.7);
                font-size: 0.95rem;
            }
        `;
        document.head.appendChild(style);
    });
</script>
</body>
</html>
