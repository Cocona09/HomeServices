<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<header>
    <div class="menu-toggle">
        <label for="sidebar-toggle">
            <span class="las la-bars"></span>
        </label>
    </div>

    <div class="header-icons">
        <span class="las la-search"></span>
        <span class="las la-bookmark"></span>
        <span class="las la-sms"></span>
    </div>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
        @csrf
    </form>
</header>
</body>
</html>
