<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest</title>
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
            <form method="POST" action="{{ route('workerCrud.workerUpdate', $worker->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="formbold-mb-3">
                    <label for="image" class="formbold-form-label">Зураг оруулах</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="formbold-form-input formbold-form-file"
                    />
                    @if ($worker->image)
                        <img src="{{ asset($worker->image) }}" alt="Current Image" width="100" height="100">
                    @endif
                </div>

                <div class="formbold-mb-5">
                    <label for="lastname" class="formbold-form-label">Овог</label>
                    <input
                        type="text"
                        name="lastname"
                        id="lastname"
                        class="formbold-form-input"
                        value="{{ old('lastname', $worker->lastname) }}"
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
                        value="{{ old('firstname', $worker->firstname) }}"
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
                        value="{{ old('job', $worker->job) }}"
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
                        value="{{ old('email', $worker->email) }}"
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
                        value="{{ old('phone', $worker->phone) }}"
                        required
                    />
                </div>

                <div class="formbold-mb-5">
                    <label class="formbold-form-label">Хүйс</label>
                    <select class="formbold-form-input" name="gender" id="gender">
                        <option value="эрэгтэй" {{ $worker->gender === 'эрэгтэй' ? 'selected' : '' }}>Эрэгтэй</option>
                        <option value="эмэгтэй" {{ $worker->gender === 'эмэгтэй' ? 'selected' : '' }}>Эмэгтэй</option>
                        <option value="бусад" {{ $worker->gender === 'бусад' ? 'selected' : '' }}>Бусад</option>
                    </select>
                </div>

                <div class="formbold-mb-5">
                    <label for="age" class="formbold-form-label">Нас</label>
                    <input
                        type="number"
                        name="age"
                        id="age"
                        class="formbold-form-input"
                        value="{{ old('age', $worker->age) }}"
                        required
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="address" class="formbold-form-label">Хаяг</label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        class="formbold-form-input"
                        value="{{ old('address', $worker->address) }}"
                        required
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
