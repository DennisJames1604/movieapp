<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ENV('APP_NAME') }} - Login</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="auth_container">
        <form action="{{ route('login') }}" method="POST" class="auth_form">
            @csrf
            <div class="logo">
                <img class="site_logo" src="{{ asset('img/logo.png') }}" alt="">
            </div>

            @if ($errors->any())
            <div class="validation_alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form_group">

                <label for="email">Email</label>
                <input class="form_input" id="email" name="email" type="email" placeholder="Email" required autofocus>

                <label for="password">Password</label>
                <input class="form_input" id="password" name="password" type="password" placeholder="password" required>

                <button class="auth_btn" type="submit">
                    Login
                </button>
            </div>
        </form>
    </div>

</body>

</html>