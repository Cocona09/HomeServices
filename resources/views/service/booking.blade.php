<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Booking - ServiceNest</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
@include('layouts.frontend.header')

<div class="booking-page">
    <div class="box-container">
        <h3 class="price">Захиалгын төлбөр: {{$services->price}}₮</h3>
        <h4 class="warning">
            Захиалга баталгаажуулах стандарт үйлчилгээний төлбөр.
        </h4>
        <hr class="hr1">

        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <div class="progress-steps">
                @foreach($services->questions as $index => $question)
                    <div class="progress-step" id="step-{{ $index }}">
                        {{ $index + 1 }}
                        <span class="step-label">Асуулт {{ $index + 1 }}</span>
                    </div>
                @endforeach
                <div class="progress-step" id="step-address">
                    {{ count($services->questions) + 1 }}
                    <span class="step-label">Хаяг</span>
                </div>
                <div class="progress-step" id="step-info">
                    {{ count($services->questions) + 2 }}
                    <span class="step-label">Мэдээлэл</span>
                </div>
            </div>
        </div>

        <form action="{{ route('service.store') }}" method="POST" id="order-form">
            @csrf
            <input type="hidden" name="service_name" value="{{ $services->name }}">

            <div id="questions-wrapper">
                @foreach($services->questions as $index => $question)
                    <div class="question-container" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                        <h2 class="question-title">{{ $question->question }}</h2>
                        @foreach($question->answers as $answer)
                            <div class="answer-option">
                                <input type="checkbox"
                                       id="answer-{{ $answer->id }}"
                                       name="answers[{{ $question->id }}][]"
                                       value="{{ $answer->answer }}"
                                       class="answer-input">
                                <label for="answer-{{ $answer->id }}" class="answer-label">{{ $answer->answer }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div id="address-section" style="display: none;">
                <h2 class="booking-section-title">Таны хаяг</h2>
                <input type="text" name="address" placeholder="Хаягаа оруулна уу..." required class="input-field">
                <textarea name="feedback" rows="4" placeholder="Нэмэлт мэдээлэл (заавал биш)" class="textarea-field"></textarea>
            </div>

            <div id="user-info-section" class="user-info-section" style="display: none;">
                <h2 class="booking-section-title">Хэрэглэгчийн мэдээлэл</h2>
                <input type="text" name="user_name" placeholder="Нэрээ оруулна уу..." required class="input-field">
                <input type="email" name="user_email" placeholder="Имэйл хаягаа оруулна уу..." required class="input-field">
                <input type="text" name="user_phone" placeholder="Утасны дугаараа оруулна уу..." required class="input-field">
            </div>

            <div class="navigation-buttons">
                <button type="button" class="prev-button" disabled>Өмнөх</button>
                <button type="button" class="next-button">Дараах</button>
                <button type="submit" class="submit-button" style="display: none;">Захиалга хийх</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/booking.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalSections = {{ count($services->questions) }} + 2; // Questions + address + info
        const progressFill = document.getElementById('progressFill');

        function updateProgress(currentIndex) {
            // Calculate progress percentage
            const progressPercent = ((currentIndex + 1) / totalSections) * 100;
            progressFill.style.width = `${progressPercent}%`;

            // Update step indicators
            document.querySelectorAll('.progress-step').forEach((step, index) => {
                step.classList.remove('active', 'completed');
                if (index < currentIndex) {
                    step.classList.add('completed');
                } else if (index === currentIndex) {
                    step.classList.add('active');
                }
            });
        }

        // Initialize progress
        updateProgress(0);

        // Add progress update to your existing JS
        const originalShowSection = window.showSection;
        window.showSection = function(index) {
            originalShowSection(index);
            updateProgress(index);
        };
    });
</script>

@include('layouts.frontend.footer')
</body>
</html>
