<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f6f8fb 0%, #e9eef6 100%);
            font-family: "Poppins", sans-serif;
        }

        .admin-login-card {
            width: min(440px, calc(100vw - 32px));
            padding: 36px;
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.12);
        }

        .admin-login-card .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
        }

        .admin-login-card .brand img {
            width: 52px;
            height: 52px;
            object-fit: contain;
        }

        .admin-login-card h1 {
            font-size: 28px;
            margin: 0 0 8px;
        }

        .admin-login-card p {
            margin: 0 0 24px;
            color: #6b7280;
        }

        .admin-login-card .form-control {
            min-height: 52px;
            border-radius: 14px;
            border: 1px solid #d5d9e2;
            padding: 12px 16px;
        }

        .admin-login-card .btn {
            min-height: 52px;
            border-radius: 14px;
            font-weight: 600;
        }

        .login-hint {
            margin-top: 18px;
            padding: 14px 16px;
            border-radius: 14px;
            background: #f8fafc;
            color: #475569;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="admin-login-card">
        <div class="brand">
            <img src="{{ asset('assets/admin/images/logo/logo.png') }}" alt="Admin">

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.authenticate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control"
                    placeholder="admin@gmail.com"
                    required
                    autofocus
                >
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Password"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>


    </div>
</body>
</html>
