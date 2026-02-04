<!doctype html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest - Төлбөр төлөх</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
@include('layouts.frontend.header')

<div class="payment-page">
    <div class="payment-container">
        <div class="payment-box">
            <!-- Payment Header -->
            <div class="payment-header">
                <h1 class="payment-title">Төлбөр төлөх</h1>
                <p class="payment-subtitle">Та доорх QR кодыг ашиглан үйлчилгээний төлбөрөө төлнө үү</p>
            </div>

            @foreach($payments as $payment)
                <!-- Instruction Section -->
                <div class="instruction-section">
                    <h2 class="instruction">{{ $payment->instruction }}</h2>

                    <!-- Warning Section -->
                    <div class="warning">
                        {{ $payment->warning }}
                    </div>

                    <!-- QR Code Section -->
                    <div class="qr-container">
                        <img src="{{ asset($payment->qr_image) }}" alt="QR Code" class="qr-code">
                        <span class="qr-label">QR код уншуулна уу</span>
                    </div>

                    <!-- Payment Steps -->
                    <div class="payment-steps">
                        <h3><i class="fas fa-list-ol"></i> Төлбөр төлөх алхамууд</h3>
                        <div class="steps-list">
                            <div class="step-item">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h4>QR код уншуулна уу</h4>
                                    <p>Банкны апп-аа нээж QR кодыг уншуулна уу</p>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h4>Дүнг шалгана уу</h4>
                                    <p>Төлбөрийн дүн зөв эсэхийг шалгана уу</p>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h4>Төлбөрөө төлнө үү</h4>
                                    <p>Баталгаажуулах товчийг дарж төлбөрөө хийгээрэй</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="payment-info">
                        <p><i class="fas fa-info-circle"></i> Төлбөр хийгдсэний дараа бид таны захиалгыг баталгаажуулна</p>
                        <p><i class="fas fa-clock"></i> Төлбөр баталгаажахад <strong>2-24 цаг</strong> шаардагдана</p>
                        <p><i class="fas fa-headset"></i> Асуулт гарвал утас: <strong>+976 - 7777 - 5557</strong></p>
                    </div>

                    <!-- Paid Button -->
                    <div class="paid-button-container">
                        <button class="paid-button" id="paidButton">
                            <i class="fas fa-check-circle"></i> Би төлбөрөө төлсөн
                        </button>
                    </div>
                </div>
            @endforeach

            <!-- Backup Payment Methods -->
            <div class="backup-methods">
                <h3><i class="fas fa-money-bill-alt"></i> Бусад төлбөрийн аргууд</h3>
                <div class="method-options">
                    <div class="method-option">
                        <i class="fas fa-credit-card"></i>
                        <span>Банкны картаар</span>
                    </div>
                    <div class="method-option">
                        <i class="fas fa-university"></i>
                        <span>Банкны шилжүүлгээр</span>
                    </div>
                    <div class="method-option">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Мобайл банкаар</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paidButton = document.getElementById('paidButton');

        paidButton.addEventListener('click', function() {
            // Show loading state
            paidButton.classList.add('loading');
            paidButton.disabled = true;

            // Simulate API call delay
            setTimeout(() => {
                Swal.fire({
                    title: 'Амжилттай!',
                    html: `
                    <div style="text-align: center;">
                        <div style="font-size: 4rem; color: #38a169; margin-bottom: 20px;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <p style="font-size: 1.2rem; line-height: 1.6;">
                            Таны захиалга амжилттай боллоо.<br>
                            Бид төлбөр хийгдсэн эсэхийг шалгаад таны профайлд мэдэгдэх болно.
                        </p>
                    </div>
                `,
                    icon: 'success',
                    confirmButtonText: 'Үйлчилгээ рүү буцах',
                    confirmButtonColor: '#2c7a7b',
                    background: '#f8fafc',
                    color: '#1a365d',
                    showCancelButton: true,
                    cancelButtonText: 'Профайл руу очих',
                    cancelButtonColor: '#718096'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route("service.contentService") }}';
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        window.location.href = '{{ route("profile.userOrder") }}';
                    }
                });

                // Reset button state
                paidButton.classList.remove('loading');
                paidButton.disabled = false;
            }, 1500);
        });

        // Add some CSS for backup methods
        const style = document.createElement('style');
        style.textContent = `
        .backup-methods {
            margin-top: 50px;
            padding-top: 40px;
            border-top: 1px solid rgba(226, 232, 240, 0.8);
        }
        .backup-methods h3 {
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            font-size: 1.4rem;
            color: var(--primary-color);
            margin-bottom: 25px;
            text-align: center;
        }
        .method-options {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }
        .method-option {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            border: 2px solid rgba(226, 232, 240, 0.8);
            transition: all 0.3s ease;
            cursor: pointer;
            min-width: 120px;
        }
        .method-option:hover {
            transform: translateY(-5px);
            border-color: var(--secondary-color);
            box-shadow: 0 10px 25px rgba(66, 153, 225, 0.15);
            background: var(--white);
        }
        .method-option i {
            font-size: 2rem;
            color: var(--secondary-color);
        }
        .method-option span {
            color: var(--text-color);
            font-weight: 500;
            font-size: 0.95rem;
        }

        /* Print styles for QR code */
        @media print {
            .payment-box {
                box-shadow: none !important;
                border: 1px solid #ccc !important;
            }
            .paid-button-container,
            .backup-methods {
                display: none !important;
            }
            .qr-code {
                width: 300px !important;
                height: 300px !important;
            }
        }

        /* QR code scanner helper */
        .qr-helper {
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 2px dashed var(--secondary-color);
            border-radius: 20px;
            pointer-events: none;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 0.5;
                border-color: var(--secondary-color);
            }
            50% {
                opacity: 1;
                border-color: var(--accent-color);
            }
        }
    `;
        document.head.appendChild(style);

        // Add QR code scanner animation
        const qrContainer = document.querySelector('.qr-container');
        if (qrContainer) {
            const helper = document.createElement('div');
            helper.className = 'qr-helper';
            qrContainer.style.position = 'relative';
            qrContainer.appendChild(helper);
        }
    });
</script>

@include('layouts.frontend.footer')
</body>
</html>
