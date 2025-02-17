@extends('layouts.master')

@section('content')
<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa;
    }
    .card {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }
    .text-center {
        text-align: center;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px;
        border-radius: 5px;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    .mt-3 {
        margin-top: 1rem;
    }
</style>

<div class="login-container">
    <div class="card">
        <h2 class="text-center">Create an Account</h2>
        
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">Already have an account? Log in</a>
        </div>
    </div>
</div>
@endsection
