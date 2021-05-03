<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <li><a href="/">Book Shop</a></li>
    </nav>
    <div class="body">
        @yield('body')
    </div>
    <footer>
        Abhishek Chhetri {{date('Y')}}. All right reserved.
    </footer>
</body>
</html>