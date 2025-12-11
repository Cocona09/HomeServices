<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/userOrder.css') }}">
</head>
<body>
<div class="sidebar-container">
    <div class="sidebar">
        <h2>Profile Settings</h2>
        <a href="{{ route('profile.edit') }}" data-section="profile-section">Профайл мэдээлэл</a>
        <a href="{{ route('profile.update') }}" data-section="password-section">Нууц үгээ шинэчлэх</a>
        <a href="{{ route('profile.destroy') }}" data-section="delete-section">Бүртгэл устгах</a>
        <h2>Client Services</h2>
        <a href="{{ route('profile.userOrder') }}">Миний захиалга</a>
        <div class="logout-container">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Гарах
            </a>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="jobs">
        <div class="table-responsive">
            @if(!$orders->isEmpty())
                <table id="ordersTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Үйлчилгээний нэр</th>
                        <th>Хариулт</th>
                        <th>Хаяг</th>
                        <th>Нэмэлт мэдээлэл</th>
                        <th class="worker-column">Ажилчин</th>
                        <th class="worker-column">Ажил</th>
                        <th class="worker-column">Утас</th>
                        <th class="worker-column">Нас</th>
                        <th class="worker-column">Хүйс</th>
                        <th class="worker-column">Захиалга</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td><div><span class="indicator"></span></div></td>
                            <td><div>{{ $order->service_name }}</div></td>
                            <td>
                                <div>
                                    @foreach(json_decode($order->answers, true) as $key => $answer)
                                       {{ implode(', ', $answer) }}: <br>
                                    @endforeach
                                </div>
                            </td>
                            <td><div>{{ $order->address }}</div></td>
                            <td><div>{{ $order->feedback }}</div></td>

                            @if($order->worker)
                                <td><div><button>{{ $order->worker->lastname }} {{ $order->worker->firstname }} </button></div></td>
                                <td><div>{{ $order->worker->job }}</div></td>
                                <td><div>{{ $order->worker->phone }}</div></td>
                                <td><div>{{ $order->worker->age }}</div></td>
                                <td><div>{{ $order->worker->gender }}</div></td>
                                <td><div style="color: forestgreen">Баталгаажсан</div></td>
                            @else
                                <td><div style="color: orangered">Баталгаажаагүй</div></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2 class="noservice">Одоогоор танд захиалсан үйлчилгээ байхгүй байна.</h2>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('#ordersTable tbody tr');
        let hasAssignedWorker = false;

        rows.forEach(row => {
            const workerCell = row.querySelector('button');
            if (workerCell) {
                hasAssignedWorker = true;
            }
        });

        const workerColumns = document.querySelectorAll('.worker-column');
        if (!hasAssignedWorker) {
            workerColumns.forEach(column => column.classList.add('hidden'));
        }
    });
</script>
</body>
</html>
