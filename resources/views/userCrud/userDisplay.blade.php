<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/homeProduct.css') }}">
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
         @if(session()->has('userUpdate'))
             <script>
                 Swal.fire({
                     title: "Good job!",
                     text: " {{ session('userUpdate') }}",
                     icon: "success"
                 });
             </script>
         @elseif(session()->has('userDelete'))
             <script>
                 Swal.fire({
                     title: "Good job!",
                     text: " {{ session('userDelete') }}",
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
                <th>Нэр</th>
                <th>Имайл</th>
                <th>хэрэглэгчийн төрөл</th>
                <th>Тохиргоо</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Users as $user)
                <tr style="background: #dfdfdf">
                    <td>{{$user->id }}</td>
                    <td>{{$user->name }}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->usertype}}</td>
                    <td>
                        <a href="{{ route('userCrud.userEdit', $user->id) }}">
                            <button class="editBtn">Засах</button>
                        </a>

                        <form method="POST" action="{{ route('userCrud.userDestroy', $user->id) }}" style="display:inline;">
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

