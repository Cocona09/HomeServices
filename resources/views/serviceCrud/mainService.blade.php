<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest</title>
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
             @if(session()->has('serviceCreate'))
                 <script>
                     Swal.fire({
                         title: "Good job!",
                         text: " {{ session('serviceCreate') }}",
                         icon: "success"
                     });
                 </script>
             @elseif(session()->has('serviceUpdate'))
                 <script>
                     Swal.fire({
                         title: "Good job!",
                         text: " {{ session('serviceUpdate') }}",
                         icon: "success"
                     });
                 </script>
             @elseif(session()->has('serviceDelete'))
                 <script>
                     Swal.fire({
                         title: "Good job!",
                         text: " {{ session('serviceDelete') }}",
                         icon: "success"
                     });
                 </script>
             @endif

         </div>
         <main>
             <div>
                 <a href="{{route('serviceCrud.createService')}}"><button class="addBtn">Нэмэх</button></a>
             </div>
             <table>
                 <thead>
                 <tr>
                     <th>ID</th>
                     <th>Үйлчилгээний нэр</th>
                     <th>Үнэ</th>
                     <th>Зураг</th>
                     <th>Тохиргоо</th>
                     <th>Асуулт</th>
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($Services as $service)
                     <tr style="background: #dfdfdf">
                         <td>{{ $service->id }}</td>
                         <td>{{ $service->name }}</td>
                         <td>{{$service->price}}</td>
                         <td>
                             <img src="{{ asset("$service->image") }}" height="60px" width="60px" style="border-radius:10px">
                         </td>
                         <td>
                             <a href="{{ route('serviceCrud.editService', $service->id) }}">
                                 <button class="editBtn">Засах</button>
                             </a>
                             <form method="POST" action="{{ route('serviceCrud.destroyService', $service->id) }}" style="display:inline;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="deleteBtn">Устгах</button>
                             </form>
                         </td>
                         <td>
                             <a href="{{ route('questionCrud.question', $service->id) }}">
                                 <button class="question-btn">Асуулт нэмэх</button>
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
