@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 500px; margin: 60px auto;">
        <div class="auth-card" style="padding: 30px; border: 1px solid #eaeaea; border-radius: 8px;">

            <h2 style="margin-bottom: 20px; text-align: center;">Login</h2>

            <div id="errorBox" style="color:red; margin-bottom:15px;"></div>

            <form id="loginForm">
                @csrf

                <div style="margin-bottom: 15px;">
                    <label>Email Address</label>
                    <input id="email" type="email" required
                           style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label>Password</label>
                    <input id="password" type="password" required
                           style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <button type="submit"
                            style="padding:10px 20px; border:none; cursor:pointer;">
                        Login
                    </button>

                    <a href="{{ route('register') }}"
                       style="color:#666; text-decoration:underline;">
                        Don't have an account?
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let errorBox = document.getElementById('errorBox');

            errorBox.innerHTML = "";

            try {
                let response = await fetch('http://127.0.0.1:8000/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                });

                let data = await response.json();

                if (response.ok && data.status === "success") {

                    // ✅ Save token & user
                    localStorage.setItem('token', data.token);
                    localStorage.setItem('user', JSON.stringify(data.user));

                    alert('Login successful');

                    // redirect after login
                    window.location.href = "/dashboard";

                } else {
                    errorBox.innerHTML = data.message || "Invalid credentials";
                }

            } catch (error) {
                console.error(error);
                errorBox.innerHTML = "Server error. Try again.";
            }
        });
    </script>

@endsection
