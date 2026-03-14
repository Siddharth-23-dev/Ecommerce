@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px; margin: 60px auto;">
    <div class="auth-card" style="padding: 30px; border: 1px solid #eaeaea; border-radius: 8px;">
        <h2 style="margin-bottom: 20px; text-align: center;">Login</h2>
        
        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <ul style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px;">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
                <input id="password" type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center;">
                <button type="submit" class="btn-primary-store" style="padding: 10px 20px; border: none; cursor: pointer;">
                    Login
                </button>
                <a href="{{ route('register') }}" style="color: #666; text-decoration: underline;">Don't have an account?</a>
            </div>
        </form>
    </div>
</div>
@endsection
