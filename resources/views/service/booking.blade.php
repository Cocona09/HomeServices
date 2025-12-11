<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Booking</title>
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
</head>
<body>
@include('layouts.frontend.header')

<div class="box-container">
    <h3 class="price">Урдчилсан төлбөр: {{$services->price}} MNT</h3>
    <h4 class="warning">
        Таны авах үйлчилгээнээс хамаараад үнэ өөр байж болохыг анхаарна уу.
    </h4>
    <hr class="hr1">

    <form action="{{ route('service.store') }}" method="POST" id="order-form">
        @csrf
        <input type="hidden" name="service_name" value="{{ $services->name }}">

        <!-- Questions Wrapper -->
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

        <!-- Address Section -->
        <div id="address-section" style="display: none;">
            <h2 class="section-title">Таны хаяг</h2>
            <input type="text" name="address" placeholder="Хаягаа оруулна уу..." required class="input-field">
            <textarea name="feedback" rows="4" placeholder="Нэмэлт мэдээлэл (заавал биш)" class="textarea-field"></textarea>
        </div>

        <div id="user-info-section" class="user-info-section" style="display: none;">
            <h2 class="section-title">Хэрэглэгчийн мэдээлэл</h2>
            <input type="text" name="user_name" placeholder="Нэрээ оруулна уу..." required class="input-field"><br><br>
            <input type="email" name="user_email" placeholder="Имайл хаягаа оруулна уу..." required class="input-field"><br><br>
            <input type="text" name="user_phone" placeholder="Утасны дугаараа оруулна уу..." required class="input-field"><br><br>
        </div>

        <!-- Navigation Buttons -->
        <div class="navigation-buttons">
            <button type="button" class="prev-button" disabled>Өмнөх</button>
            <button type="button" class="next-button">Дараах</button>
            <button type="submit" class="submit-button" style="display: none;">Цааш</button>
        </div>
    </form>
</div>

<script src="{{ asset('js/booking.js') }}"></script>
@include('layouts.frontend.footer')
</body>
</html>
