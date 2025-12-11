<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/createS.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel= "stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
<input type="checkbox" name="" id="sidebar-toggle">

@include('layouts.admin.sidebar');

<div class="main-content">
    @include('layouts.admin.dashHeader');
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form method="POST" action="{{route('payment.paymentStore')}}" enctype="multipart/form-data">
                @csrf
                <div class="formbold-mb-5">
                    <label for="Instruction" class="formbold-form-label">Instruction</label>
                    <input
                        type="text"
                        name="instruction"
                        id="instruction"
                        class="formbold-form-input"
                    />
                </div>

                <div class="formbold-mb-5">
                    <label for="Warning" class="formbold-form-label">Warning</label>
                    <input
                        type="text"
                        name="warning"
                        id="warning"
                        class="formbold-form-input"
                    />
                </div>

                <div class="formbold-mb-3">
                    <label for="qr_image" class="formbold-form-label">
                        Upload QR
                    </label>
                    <input
                        type="file"
                        name="qr_image"
                        id="qr_image"
                        class="formbold-form-input formbold-form-file"
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
