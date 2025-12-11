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
            <form method="POST" action="{{ route('orderCrud.orderUpdate', $order->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="formbold-mb-5">
                    <label for="service_name" class="formbold-form-label">Service_Name</label>
                    <input
                        type="text"
                        name="service_name"
                        id="service_name"
                        class="formbold-form-input"
                        value="{{ old('service_name', $order->service_name) }}"
                    />
                </div>
                <div class="formbold-mb-5">
                    <label for="Answers" class="formbold-form-label">Answers</label>
                    <textarea
                        name="answers"
                        id="answers"
                        class="formbold-form-input">{{ old('answers', json_encode($order->answers)) }}</textarea>
                </div>

                <div class="formbold-mb-5">
                    <label for="Address" class="formbold-form-label">Address</label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        class="formbold-form-input"
                        value="{{ old('address', $order->address) }}"
                    />
                </div>
                <div class="formbold-mb-5">
                    <label for="Feedback" class="formbold-form-label">Feedback</label>
                    <textarea
                        name="feedback"
                        id="feedback"
                        class="formbold-form-input">{{ old('feedback', $order->feedback) }}</textarea>
                </div>

                <div class="formbold-mb-5">
                    <label for="user_name" class="formbold-form-label">Username</label>
                    <input
                        type="text"
                        name="user_name"
                        id="user_name"
                        class="formbold-form-input"
                        value="{{ old('user_name', $order->user_name) }}"
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="user_email" class="formbold-form-label">User Email</label>
                    <input
                        type="email"
                        name="user_email"
                        id="user_email"
                        class="formbold-form-input"
                        value="{{ old('user_email', $order->user_email) }}"
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="user_phone" class="formbold-form-label">User phone</label>
                    <input
                        type="text"
                        name="user_phone"
                        id="user_phone"
                        class="formbold-form-input"
                        value="{{ old('user_phone', $order->user_phone)}}"
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
