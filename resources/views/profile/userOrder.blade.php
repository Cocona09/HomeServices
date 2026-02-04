<!doctype html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest - Миний захиалгууд</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
@include('layouts.frontend.header')

<div class="profile-page">
    <div class="profile-container">
        <div class="profile-sidebar">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h3 class="user-name">{{ Auth::user()->name }}</h3>
                <p class="user-email">{{ Auth::user()->email }}</p>
            </div>

            <h2><i class="fas fa-cog"></i> Тохиргоо</h2>
            <a href="{{ route('profile.edit') }}">
                <i class="fas fa-user"></i> Профайл мэдээлэл
            </a>
            <a href="#" data-section="password-section">
                <i class="fas fa-lock"></i> Нууц үг шинэчлэх
            </a>
            <a href="#" data-section="delete-section">
                <i class="fas fa-trash-alt"></i> Бүртгэл устгах
            </a>

            <h2><i class="fas fa-concierge-bell"></i> Үйлчилгээ</h2>
            <a href="{{ route('profile.userOrder') }}" class="active">
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

        <div class="profile-content" style="padding: 40px 50px; overflow-x: auto;">
            <div class="orders-header">
                <h2>Миний захиалгууд</h2>
                <p>Таны ServiceNest платформ дээр хийсэн бүх захиалгын мэдээлэл энд харагдана.</p>
            </div>

            @if(!$orders->isEmpty())
                <div class="table-responsive">
                    <table class="orders-table">
                        <thead>
                        <tr>
                            <th>Төлөв</th>
                            <th>Үйлчилгээ</th>
                            <th>Хариултууд</th>
                            <th>Хаяг</th>
                            <th>Тайлбар</th>
                            <th>Мэргэжилтэн</th>
                            <th>Холбоо барих</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    @if($order->worker)
                                        <span class="status-indicator status-confirmed" title="Баталгаажсан"></span>
                                        <span class="status-text">Баталгаажсан</span>
                                    @else
                                        <span class="status-indicator status-pending" title="Хүлээгдэж байна"></span>
                                        <span class="status-text">Хүлээгдэж байна</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $order->service_name }}</strong>
                                </td>
                                <td>
                                    <div class="answers-container">
                                        @if($order->answers)
                                            @foreach(json_decode($order->answers, true) as $answer)
                                                <div class="answer-item">
                                                    {{ implode(', ', $answer) }}
                                                </div>
                                            @endforeach
                                        @else
                                            <span class="no-answer">Хариултгүй</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="address-text">
                                        {{ $order->address }}
                                    </div>
                                </td>
                                <td>
                                    <div class="feedback-text">
                                        @if($order->feedback)
                                            {{ \Illuminate\Support\Str::limit($order->feedback, 40) }}
                                            @if(strlen($order->feedback) > 40)
                                                <span class="more-text" title="{{ $order->feedback }}">...</span>
                                            @endif
                                        @else
                                            <span class="text-muted">Тайлбаргүй</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if($order->worker)
                                        <button class="worker-button"
                                                onclick="showWorkerDetails({{ $order->worker->id }})"
                                                title="{{ $order->worker->lastname }} {{ $order->worker->firstname }}">
                                            {{ \Illuminate\Support\Str::limit($order->worker->lastname . ' ' . $order->worker->firstname, 15) }}
                                        </button>
                                    @else
                                        <span class="pending-worker">Томилогдоогүй</span>
                                    @endif
                                </td>
                                <td>
                                    @if($order->worker)
                                        <div class="contact-info">
                                            <a href="tel:{{ $order->worker->phone }}" class="contact-link" title="Утасдах: {{ $order->worker->phone }}">
                                                <i class="fas fa-phone"></i>
                                                <span class="phone-text">{{ \Illuminate\Support\Str::limit($order->worker->phone, 12) }}</span>
                                            </a>
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="orders-summary" style="margin-top: 40px;">
                    <div class="summary-card">
                        <div class="summary-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="summary-content">
                            <h3>Нийт захиалга: {{ $orders->count() }}</h3>
                            <p>Баталгаажсан: {{ $orders->where('worker', '!=', null)->count() }}</p>
                            <p>Хүлээгдэж байгаа: {{ $orders->where('worker', null)->count() }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="no-orders">
                    <div class="no-orders-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h2>Одоогоор танд захиалсан үйлчилгээ байхгүй байна.</h2>
                    <p>ServiceNest дээр анхны үйлчилгээгээ захиалаад үзээрэй!</p>
                    <a href="{{ route('service.contentService') }}" class="no-orders-btn">
                        <i class="fas fa-search"></i> Үйлчилгээ хайх
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@include('layouts.frontend.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function showWorkerDetails(workerId) {
            const detailsDiv = document.getElementById(`worker-${workerId}`);
            const isVisible = detailsDiv.style.display === 'block';

            document.querySelectorAll('.worker-details').forEach(div => {
                div.style.display = 'none';
            });

            detailsDiv.style.display = isVisible ? 'none' : 'block';
        }

        document.querySelectorAll('.worker-button').forEach(button => {
            const workerId = button.getAttribute('onclick').match(/\d+/)[0];
            button.onclick = function() {
                showWorkerDetails(workerId);
            };
        });

        const style = document.createElement('style');
        style.textContent = `
            .table-responsive {
                overflow-x: auto;
                border-radius: 16px;
                background: var(--white);
                box-shadow: 0 5px 20px rgba(66, 153, 225, 0.1);
            }
            .answer-item {
                margin-bottom: 8px;
                padding-bottom: 8px;
                border-bottom: 1px solid rgba(226, 232, 240, 0.5);
            }
            .answer-item:last-child {
                border-bottom: none;
                margin-bottom: 0;
                padding-bottom: 0;
            }
            .text-muted {
                color: var(--text-light);
                font-style: italic;
            }
            .pending-worker {
                color: #dd6b20;
                font-weight: 500;
            }
            .contact-link {
                color: var(--secondary-color);
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 8px;
                transition: color 0.3s ease;
            }
            .contact-link:hover {
                color: var(--primary-color);
                text-decoration: underline;
            }
            .orders-summary {
                margin-top: 40px;
            }
            .summary-card {
                background: linear-gradient(135deg, rgba(44, 122, 123, 0.1) 0%, rgba(26, 54, 93, 0.1) 100%);
                border-radius: 16px;
                padding: 25px;
                display: flex;
                align-items: center;
                gap: 20px;
                max-width: 400px;
            }
            .summary-icon {
                font-size: 2.5rem;
                color: var(--secondary-color);
            }
            .summary-content h3 {
                font-family: "Montserrat", sans-serif;
                font-weight: 700;
                color: var(--primary-color);
                margin-bottom: 10px;
            }
            .summary-content p {
                color: var(--text-color);
                margin-bottom: 5px;
                font-size: 0.95rem;
            }
            .no-orders {
                text-align: center;
                padding: 60px 20px;
            }
            .no-orders-icon {
                font-size: 4rem;
                color: var(--border-color);
                margin-bottom: 30px;
            }
            .no-orders h2 {
                font-family: "Montserrat", sans-serif;
                font-weight: 700;
                color: var(--primary-color);
                margin-bottom: 20px;
            }
            .no-orders p {
                color: var(--text-light);
                font-size: 1.1rem;
                margin-bottom: 30px;
                max-width: 500px;
                margin-left: auto;
                margin-right: auto;
            }
            .no-orders-btn {
                display: inline-block;
                background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
                color: var(--white);
                padding: 16px 35px;
                border-radius: 12px;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
                font-family: "Montserrat", sans-serif;
            }
            .no-orders-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(44, 122, 123, 0.3);
                text-decoration: none;
            }
            .worker-details {
                background: rgba(237, 242, 247, 0.9);
                border-radius: 10px;
                padding: 15px;
                margin-top: 10px;
                border-left: 4px solid var(--secondary-color);
                animation: fadeIn 0.3s ease;
            }
            .worker-details p {
                margin-bottom: 8px;
                font-size: 0.9rem;
            }
            .worker-details p:last-child {
                margin-bottom: 0;
            }
        `;
        document.head.appendChild(style);
    });
</script>
</body>
</html>
