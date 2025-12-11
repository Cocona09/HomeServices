<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest</title>
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

    <main>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Овог</th>
                <th>Нэр</th>
                <th>Имайл</th>
                <th>Хүйс</th>
                <th>Утас</th>
                <th>Ажил</th>
                <th>Гадаад хэл</th>
                <th>Туршлага</th>
                <th>Нас</th>
                <th>Хаяг</th>
                <th>Эссэ</th>
                <th>Огноо</th>
                <th>Зураг</th>
                <th>Шийдвэр</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr id="row-{{ $application->id }}" style="background: #dfdfdf">
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->lastname }}</td>
                    <td>{{ $application->firstname }}</td>
                    <td>{{ $application->email }}</td>
                    <td>{{ $application->gender }}</td>
                    <td>{{ $application->phone }}</td>
                    <td>{{ $application->job }}</td>
                    <td>{{ $application->languages }}</td>
                    <td>{{ $application->experience }}</td>
                    <td>{{ $application->age }}</td>
                    <td>{{ $application->address }}</td>
                    <td>{{ $application->message }}</td>
                    <td>{{ $application->created_at->format('Y-m-d') }}</td>
                    <td>
                        <img src="{{ asset("$application->image") }}" height="80px" width="80px" style="border-radius:10px">
                    </td>

                    <td>
                        <button onclick="setStatus('{{ $application->id }}', 'accepted')" class="acceptBtn">Зөвшөөрөх</button>
                        <button onclick="setStatus('{{ $application->id }}', 'rejected')" class="rejectBtn">Татгалзах</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
</div>

<label for="sidebar-toggle" class="body-label"></label>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const rows = document.querySelectorAll('tr[id^="row-"]');
        rows.forEach(row => {
            const id = row.id.split('-')[1];
            const status = localStorage.getItem('application-' + id);
            if (status) {
                row.style.backgroundColor = status === 'accepted' ? 'darkcyan' : 'orangered';
            }
        });
    });

    function setStatus(id, status) {
        localStorage.setItem('application-' + id, status);
        const row = document.getElementById('row-' + id);
        row.style.backgroundColor = status === 'accepted' ? 'darkcyan' : 'orangered';
    }
</script>

</body>
</html>
