<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/paymentDisplay.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
@include('layouts.frontend.header')

<div class="box-container">
    @foreach($payments as $payment)
        <h2 class="instruction">{{ $payment->instruction }}</h2>
        <h3 class="warning">Сануулга: {{ $payment->warning }}</h3>
        <img src="{{ asset($payment->qr_image) }}" alt="QR Code">
    @endforeach
    <button class="paid-button">Төлсөн</button>
</div>

<script>
    document.querySelector('.paid-button').addEventListener('click', function() {
        Swal.fire({
            title: 'Good Job!',
            text: 'Таны захиалга амжилттай боллоо. Бид төлбөр хийгдсэн эсэхийг шалгаад таны профайлд мэдэгдэх болно. Баярлалаа',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/';
            }
        });
    });

</script>
</body>
</html>
