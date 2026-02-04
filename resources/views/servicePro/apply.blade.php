<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest - Мэргэлжилтэн болох</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div>
    @include('layouts.frontend.header')
</div>

<!-- Success Message -->
<div>
    @if(session()->has('apply'))
        <script>
            Swal.fire({
                title: "Амжилттай!",
                text: "{{ session('apply') }}",
                icon: "success",
                confirmButtonText: "OK",
                background: '#f8fafc',
                color: '#1a365d'
            });
        </script>
    @endif
</div>

<div class="apply-page">
    <div class="formbold-main-wrapper">
        <!-- Form Header -->
        <div class="form-header">
            <h1>Мэргэлжилтэн болох</h1>
            <p>ServiceNest багт нэгдэж, итгэмжлэгдсэн мэргэжилтэн болох хүсэлтээ илгээнэ үү. Бид таны мэдээллийг нууцлах болно.</p>
        </div>

        <div class="formbold-form-wrapper">
            <form method="POST" action="{{ route('servicePro.store') }}" enctype="multipart/form-data" id="professionalForm">
                @csrf

                <div class="section-title">
                    <h2>Хувийн мэдээлэл</h2>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="lastname" class="formbold-form-label">Овог</label>
                        <input
                            type="text"
                            name="lastname"
                            id="lastname"
                            placeholder="Таны овог..."
                            class="formbold-form-input"
                            required
                        />
                    </div>

                    <div>
                        <label for="firstname" class="formbold-form-label">Нэр</label>
                        <input
                            type="text"
                            name="firstname"
                            id="firstname"
                            placeholder="Таны нэр..."
                            class="formbold-form-input"
                            required
                        />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="email" class="formbold-form-label">Имэйл хаяг</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="Таны имэйл хаяг..."
                            class="formbold-form-input"
                            required
                        />
                    </div>

                    <div>
                        <label for="gender" class="formbold-form-label">Хүйс</label>
                        <select class="formbold-form-input" name="gender" id="gender" required>
                            <option value="">Сонгоно уу...</option>
                            <option value="эрэгтэй">Эрэгтэй</option>
                            <option value="эмэгтэй">Эмэгтэй</option>
                            <option value="бусад">Бусад</option>
                        </select>
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="phone" class="formbold-form-label">Утас дугаар</label>
                        <input
                            type="tel"
                            name="phone"
                            id="phone"
                            placeholder="Таны утасны дугаар..."
                            class="formbold-form-input"
                            required
                            pattern="[0-9]{8}"
                            title="Утасны дугаар (8 оронтой)"
                        />
                    </div>

                    <div>
                        <label for="age" class="formbold-form-label">Нас</label>
                        <input
                            type="number"
                            name="age"
                            id="age"
                            placeholder="Таны нас..."
                            class="formbold-form-input"
                            min="18"
                            max="70"
                            required
                        />
                    </div>
                </div>

                <div>
                    <label for="address" class="formbold-form-label">Хаяг</label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        placeholder="Таны бүрэн хаяг..."
                        class="formbold-form-input"
                        required
                    />
                </div>

                <!-- Professional Information Section -->
                <div class="section-title">
                    <h2>Мэргэжлийн мэдээлэл</h2>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="job" class="formbold-form-label">Албан тушаал / Мэргэжил</label>
                        <input
                            type="text"
                            name="job"
                            id="job"
                            placeholder="Жишээ: Цэвэрлэгч, Засварчин..."
                            class="formbold-form-input"
                            required
                        />
                    </div>

                    <div>
                        <label for="experience" class="formbold-form-label">Ажлын туршлага (жил)</label>
                        <input
                            type="number"
                            name="experience"
                            id="experience"
                            placeholder="Жишээ: 3"
                            class="formbold-form-input"
                            min="0"
                            max="50"
                            required
                        />
                    </div>
                </div>

                <div>
                    <label for="languages" class="formbold-form-label">Гадаад хэлний мэдлэг</label>
                    <input
                        type="text"
                        name="languages"
                        id="languages"
                        placeholder="Жишээ: Англи, Орос..."
                        class="formbold-form-input"
                        required
                    />
                </div>

                <!-- Essay Section -->
                <div>
                    <label for="message" class="formbold-form-label">
                        Миний тухай (Эссэ)
                    </label>
                    <textarea
                        rows="6"
                        name="message"
                        id="message"
                        class="formbold-form-input"
                        placeholder="Өөрийн тухай, мэргэжлийн туршлага, зорилго зэргийг бичнэ үү..."
                        required
                    ></textarea>
                    <small class="hint-text">Хамгийн багадаа 200 тэмдэгт</small>
                </div>

                <!-- File Upload Section -->
                <div class="formbold-form-file-flex">
                    <label for="image" class="formbold-form-label">
                        Профайл зураг оруулах
                    </label>
                    <p class="file-hint">Зөвшөөрөгдөх формат: JPG, PNG, JPEG. Хамгийн их хэмжээ: 5MB</p>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="formbold-form-file"
                        accept=".jpg,.jpeg,.png"
                        required
                    />
                </div>

                <!-- Terms and Conditions -->
                <div class="terms-checkbox">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                        Би ServiceNest-ийн <a href="#" class="terms-link">Үйлчилгээний нөхцөл</a> болон
                        <a href="#" class="terms-link">Нууцлалын бодлого</a>-ыг уншиж, зөвшөөрч байна.
                    </label>
                </div>

                <button class="formbold-btn" id="submitBtn">Хүсэлт явуулах</button>
            </form>
        </div>
    </div>
</div>

@include('layouts.frontend.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('professionalForm');
        const submitBtn = document.getElementById('submitBtn');

        // Form validation
        form.addEventListener('submit', function(e) {
            // Validate essay length
            const essay = document.getElementById('message');
            if (essay.value.length < 200) {
                e.preventDefault();
                alert('Эссэ хамгийн багадаа 200 тэмдэгт байх ёстой!');
                essay.focus();
                return;
            }

            // Validate file size
            const fileInput = document.getElementById('image');
            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 5) {
                    e.preventDefault();
                    alert('Зурагны хэмжээ 5MB-аас хэтрэхгүй байх ёстой!');
                    return;
                }
            }

            // Validate terms acceptance
            const terms = document.getElementById('terms');
            if (!terms.checked) {
                e.preventDefault();
                alert('Та үйлчилгээний нөхцөл зөвшөөрөх ёстой!');
                return;
            }

            // Show loading state
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '';
        });

        // Real-time essay character counter
        const essay = document.getElementById('message');
        const charCounter = document.createElement('div');
        charCounter.className = 'char-counter';
        charCounter.style.fontSize = '0.9rem';
        charCounter.style.color = 'var(--text-light)';
        charCounter.style.marginTop = '5px';
        essay.parentNode.appendChild(charCounter);

        essay.addEventListener('input', function() {
            const count = essay.value.length;
            charCounter.textContent = `${count} / 200 тэмдэгт`;

            if (count < 200) {
                charCounter.style.color = '#e53e3e';
            } else {
                charCounter.style.color = '#38a169';
            }
        });

        // Trigger initial count
        essay.dispatchEvent(new Event('input'));
    });
</script>

<style>
    /* Additional styles for apply page */
    .section-title {
        margin: 40px 0 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid rgba(226, 232, 240, 0.8);
        position: relative;
    }

    .section-title h2 {
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
        font-size: 1.5rem;
        color: var(--primary-color);
        margin: 0;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 80px;
        height: 2px;
        background: linear-gradient(90deg, var(--secondary-color) 0%, var(--accent-color) 100%);
    }

    .hint-text {
        display: block;
        color: var(--text-light);
        font-size: 0.9rem;
        margin-top: -20px;
        margin-bottom: 20px;
    }

    .file-hint {
        color: var(--text-light);
        font-size: 0.9rem;
        margin-bottom: 15px;
    }

    .terms-checkbox {
        display: flex;
        align-items: flex-start;
        margin-bottom: 30px;
        padding: 20px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(237, 242, 247, 0.9) 100%);
        border-radius: 12px;
        border: 1px solid var(--border-color);
    }

    .terms-checkbox input[type="checkbox"] {
        margin-right: 12px;
        margin-top: 3px;
        width: 18px;
        height: 18px;
        border-radius: 4px;
        border: 2px solid var(--border-color);
        background: var(--white);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .terms-checkbox input[type="checkbox"]:checked {
        background: var(--secondary-color);
        border-color: var(--secondary-color);
    }

    .terms-checkbox label {
        color: var(--text-color);
        font-size: 0.95rem;
        line-height: 1.5;
        cursor: pointer;
    }

    .terms-link {
        color: var(--secondary-color);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .terms-link:hover {
        color: var(--primary-color);
        text-decoration: underline;
    }
</style>
</body>
</html>
