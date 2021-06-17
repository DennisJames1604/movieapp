@extends('layouts.app')

@section('title')
    Email settings
@endsection

@section('content')
<div class="auth_container">
    <form action="{{ route('password.update', $user->id) }}" method="POST" class="auth_form">
        @method('PUT')
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

        @if(session()->has('success'))
        <div style="background-color: #0ecc21; border-radius: 5px; color: white; padding: 0.5rem; text-align: center; margin-bottom: 2rem;">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="form_group">
            <label for="current_password">Current password</label>
            <input class="form_input" id="current_password" name="current_password" type="password" placeholder="Password" required autofocus>

            <label for="password">New password</label>
            <input class="form_input" id="password" name="password" type="password" placeholder="New password" required>

            <label for="password_confirm">Confirm new password</label>
            <input class="form_input" id="password_confirm" name="password_confirmation" type="password" placeholder="New Email" required>

            <button class="auth_btn" type="submit">
                Update password
            </button>
            <div style="display: flex; justify-content: space-between">
                <a href="{{ route('register') }}" class="reg_link">
                    <small>Go back</small>
                </a>

                <a href="{{ route('register') }}" class="reg_link">
                    <small>Click here to update your email</small>
                </a>
            </div>

        </div>
    </form>
</div>
@endsection
