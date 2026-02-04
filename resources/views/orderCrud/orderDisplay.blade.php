<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<input type="checkbox" name="" id="sidebar-toggle">
@include('layouts.admin.sidebar')
<div class="main-content">
    @include('layouts.admin.dashHeader')
    <div>
        @if(session()->has('orderUpdate'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: " {{ session('orderUpdate') }}",
                    icon: "success"
                });
            </script>
        @elseif(session()->has('orderDelete'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: " {{ session('orderDelete') }}",
                    icon: "success"
                });
            </script>
        @endif
    </div>
    <main>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Үйлчилгээний нэр</th>
                <th>Хариултууд</th>
                <th>Хаяг</th>
                <th>Нэмэлт мэдээлэл</th>
                <th>Хэрэглэгчийн нэр</th>
                <th>Хэрэглэгчийн имайл</th>
                <th>Хэрэглэгчийн утас</th>
                <th>Огноо</th>
                <th>Тохиргоо</th>
                <th>Баталгаажуулалт</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr style="background: #dfdfdf">
                    <td>{{$order->id }}</td>
                    <td>{{$order->service_name }}</td>
                    <td>
                        @foreach(json_decode($order->answers, true) as $key => $answer)
                           : {{ implode(', ', $answer) }} <br>
                        @endforeach
                    </td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->feedback}}</td>
                    <td>{{$order->user_name}}</td>
                    <td>{{$order->user_email}}</td>
                    <td>{{$order->user_phone}}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('orderCrud.orderEdit', $order->id) }}">
                            <button class="editBtn">Засах</button>
                        </a>
                        <form method="POST" action="{{ route('orderCrud.orderDestroy', $order->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deleteBtn">Устгах</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('workerInfo.sendInfo', $order->id) }}">
                            <button class="ackBtn">Баталгаажуулах</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
</div>

<label for="sidebar-toggle" class="body-label"></label>
</body>
</html>
