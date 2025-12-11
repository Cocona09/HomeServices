<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Service</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/createS.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
<input type="checkbox" id="sidebar-toggle">
@include('layouts.admin.sidebar')

<div class="main-content">
    @include('layouts.admin.dashHeader')

    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form method="POST" action="{{ route('userCrud.userUpdate', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="formbold-mb-5">
                    <label for="name" class="formbold-form-label">Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="formbold-form-input"
                        value="{{ old('name', $user->name) }}"
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="email" class="formbold-form-label">Email</label>
                    <input
                        type="text"
                        name="email"
                        id="email"
                        class="formbold-form-input"
                        value="{{ old('email', $user->email) }}"
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="usertype" class="formbold-form-label">Usertype</label>
                    <input
                        type="text"
                        name="usertype"
                        id="usertype"
                        class="formbold-form-input"
                        value="{{ old('usertype', $user->usertype) }}"
                    />
                </div>

                <div>
                    <button type="submit" class="formbold-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<label for="sidebar-toggle" class="body-label"></label>
</body>
</html>
