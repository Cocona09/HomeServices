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
        @if(session()->has('workerCreate'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: " {{ session('workerCreate') }}",
                    icon: "success"
                });
            </script>
        @elseif(session()->has('workerUpdate'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: " {{ session('workerUpdate') }}",
                    icon: "success"
                });
            </script>
        @elseif(session()->has('workerDelete'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: " {{ session('workerDelete') }}",
                    icon: "success"
                });
            </script>
        @endif

    </div>
    <main>
        <div>
            <a href="{{route('workerCrud.workerCreate')}}"><button class="addBtn">Нэмэх</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Зураг</th>
                <th>Овог</th>
                <th>Нэр</th>
                <th>Ажил</th>
                <th>Имайл</th>
                <th>Утас</th>
                <th>Хүйс</th>
                <th>Нас</th>
                <th>Хаяг</th>
                <th>Тохиргоо</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                <tr style="background: #dfdfdf">
                    <td>{{ $worker->id }}</td>
                    <td>
                        <img src="{{ asset("$worker->image") }}" height="80px" width="80px" style="border-radius:10px">
                    </td>
                    <td>{{$worker->lastname}}</td>
                    <td>{{ $worker->firstname}}</td>
                    <td>{{$worker->job}}</td>
                    <td>{{$worker->email}}</td>
                    <td>{{$worker->phone}}</td>
                    <td>{{$worker->gender}}</td>
                    <td>{{$worker->age}}</td>
                    <td>{{$worker->address}}</td>
                    <td>
                        <a href="{{ route('workerCrud.workerEdit', $worker->id) }}">
                            <button class="editBtn">Засах</button>
                        </a>
                        <form method="POST" action="{{ route('workerCrud.workerDestroy', $worker->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deleteBtn">Устгах</button>
                        </form>
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
