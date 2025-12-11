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
            <form method="POST" action="{{ route('serviceCrud.updateService', $service->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="formbold-mb-5">
                    <label for="name" class="formbold-form-label">Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="formbold-form-input"
                        value="{{ old('name', $service->name) }}"
                    />
                </div>
                <div class="formbold-mb-5">
                    <label for="price" class="formbold-form-label">Price</label>
                    <input
                        type="number"
                        name="price"
                        id="price"
                        class="formbold-form-input"
                        value="{{ old('price', $service->price) }}"
                    />
                </div>

                <div class="formbold-mb-3">
                    <label for="image" class="formbold-form-label">Upload Image</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="formbold-form-input formbold-form-file"
                    />
                    @if ($service->image)
                        <img src="{{ asset($service->image) }}" alt="Current Image" width="100" height="100">
                    @endif
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
