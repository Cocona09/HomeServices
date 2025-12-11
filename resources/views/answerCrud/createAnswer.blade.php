<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest</title>
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
            <form method="POST" action="{{ route('answerCrud.storeAnswer', $question->id) }}">
                @csrf
                <div class="formbold-mb-5">
                    <label for="answer" class="formbold-form-label">Answer</label>
                    <input type="text" name="answer" id="answer" class="formbold-form-input" required />
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
