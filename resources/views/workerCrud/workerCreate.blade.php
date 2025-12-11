<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/createS.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel= "stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
<input type="checkbox" name="" id="sidebar-toggle">

@include('layouts.admin.sidebar');

<div class="main-content">
    @include('layouts.admin.dashHeader');
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form method="POST" action="{{route('workerCrud.workerStore')}}" enctype="multipart/form-data">
                @csrf

                <div class="formbold-mb-3">
                    <label for="Image" class="formbold-form-label">
                        Зураг оруулах
                    </label>
                    <input
                        type="file"
                        name="image"
                        id="Image"
                        class="formbold-form-input formbold-form-file"
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="Lastname" class="formbold-form-label">Овог</label>
                    <input
                        type="text"
                        name="lastname"
                        id="lastname"
                        class="formbold-form-input"
                        required
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="firstname" class="formbold-form-label">Нэр</label>
                    <input
                        type="text"
                        name="firstname"
                        id="firstname"
                        class="formbold-form-input"
                        required
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="job" class="formbold-form-label">Ажил</label>
                    <input
                        type="text"
                        name="job"
                        id="job"
                        class="formbold-form-input"
                        required
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="email" class="formbold-form-label">Имайл</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="formbold-form-input"
                        required
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="phone" class="formbold-form-label">Утасны дугаар</label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        class="formbold-form-input"
                        required
                    />
                </div>

                <div class="formbold-mb-5">
                    <label class="formbold-form-label">Хүйс</label>

                    <select class="formbold-form-input" name="gender" id="gender">
                        <option value="эрэгтэй">Эрэгтэй</option>
                        <option value="эмэгтэй">Эмэгтэй</option>
                        <option value="бусад">Бусад</option>
                    </select>
                </div>

                <div class="formbold-mb-5">
                    <label for="age" class="formbold-form-label"> Нас </label>
                    <input
                        type="text"
                        name="age"
                        id="age"
                        class="formbold-form-input"
                        required
                    />
                </div>
                <div class="formbold-mb-5">
                    <label for="address" class="formbold-form-label"> Хаяг </label>

                    <input
                        type="text"
                        name="address"
                        id="address"
                        class="formbold-form-input formbold-mb-3"
                        required
                    />
                </div>

                <div>
                    <button type="submit" class="formbold-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<label for="sidebar-toggle" class="body-label"></label>
</body>
</html>
