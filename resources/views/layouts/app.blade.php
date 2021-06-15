<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ENV('APP_NAME') }} - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="nav_container">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Movies</a></li>
            <li><a href="#">Series</a></li>
            <form class="right_nav" id="form">
                <input type="text" placeholder="search" class="search_input" id="search">
            </form>
            <li class="right_navn">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
