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
        @if(session()->has('questionCreate'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: " {{ session('questionCreate') }}",
                    icon: "success"
                });
            </script>
        @elseif(session()->has('questionUpdate'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: " {{ session('questionUpdate') }}",
                    icon: "success"
                });
            </script>
        @elseif(session()->has('questionDelete'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: " {{ session('questionDelete') }}",
                    icon: "success"
                });
            </script>
        @endif

    </div>
    <main>
        <div>
            <a href="{{ route('questionCrud.createQuestion', $service->id) }}"><button class="addBtn">Нэмэх</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Асуулт</th>
                <th>Тохиргоо</th>
                <th>Хариулт</th>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                <tr style="background: #dfdfdf">
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>
                        <a href="{{ route('questionCrud.editQuestion', $question->id) }}">
                            <button class="editBtn">Засах</button>
                        </a>

                        <form method="POST" action="{{ route('questionCrud.destroyQuestion', $question->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deleteBtn">Устгах</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('answerCrud.answer', $question->id) }}">
                            <button class="question-btn">Хариулт нэмэх</button>
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
