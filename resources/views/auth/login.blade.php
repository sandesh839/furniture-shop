<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding-top: 50px;
        }
        .login-container .card {
            padding: 20px;
        }
        .login-container .form-control {
            margin-bottom: 15px;
        }
        .login-container .btn {
            width: 100%;
            margin-top: 10px;
        }
        .login-container .text-center a {
            text-decoration: none;
            color: #007bff;
            font-size: 0.875rem; /* Small text for the links */
        }
        .login-container .or-divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 15px 0;
        }
        .login-container .or-divider::before,
        .login-container .or-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #ddd;
        }
        .login-container .or-divider::before {
            margin-right: 10px;
        }
        .login-container .or-divider::after {
            margin-left: 10px;
        }
        .google-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
        }
        .google-btn img {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    @extends('layouts.master')
    @section('content')
    <div class="login-container">
        <div class="card">
            <h2 class="text-center">Welcome!</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('register') }}">Create an account</a>  |
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </div>

            {{-- <div class="or-divider">OR</div>

            <!-- Google Button -->
            <button class="btn btn-danger google-btn">
                <img src="{{ asset('images/google.png') }}" width="20" height="20" alt="Google logo">
                Continue with Google
            </button> --}}
        </div>
    </div>
    @endsection
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>