<!DOCTYPE html>
<html>
<head>
    <title>Laravel Task</title>
    <meta name="description" content="Laravel Test Task">
    <meta name="author" content="Inna Tarasyan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/"> Главная страница </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news.index') }}"> Новости </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> Галерея </a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>
<footer>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    @yield('js')
</footer>
</html>
