@extends('layouts.app')

@section('title')
    Email settings
@endsection

@section('content')
<div class="auth_container">
    <form action="{{ route('email.update', $user->id) }}" method="POST" class="auth_form">
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
            <label for="email">Current Email</label>
            <input class="form_input" id="email" type="email" placeholder="Email" value="{{ $user->email }}" required autofocus disabled>

            <label for="new_email">New Email</label>
            <input class="form_input" id="new_email" name="email" type="email" placeholder="New Email" required>

            <button class="auth_btn" type="submit">
                Update Email
            </button>
            <div style="display: flex; justify-content: space-between">
                <a href="{{ route('register') }}" class="reg_link">
                    <small>Go back</small>
                </a>

                <a href="{{ route('password.index', $user->name) }}" class="reg_link">
                    <small>Click here to update your password</small>
                </a>
            </div>

        </div>
    </form>
</div>
@endsection
