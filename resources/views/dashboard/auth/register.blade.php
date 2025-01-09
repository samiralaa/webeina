@extends('dashboard.layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }

        html {
            height: 100vh;
        }

        .login-container {
            max-width: 450px;
            margin: 70px auto;
            padding: 30px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .login-container h2 {
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        h5 {
            text-transform: capitalize;
        }

        .login-container .form-group {
            margin-bottom: 15px;
        }

        .login-container .form-control {
            border-radius: 5px;
        }

        .btn-custom {
            background-color: #18A686;
            color: white;
            width: 100%;
            border-radius: 5px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .btn-custom:hover {
            background-color: #076767;
            color: white;

        }

        .btn-custom:focus {
            outline: none;
            border: 2px solid #18A686;
            background-color: #18A686;
            box-shadow: 0 4px 10px #0767678f;
            color: white;
        }

        /* Custom styling for the checkbox */
        .form-check-input {
            width: 20px;
            height: 20px;
            background-color: white;
            border: 2px solid #18A686;
            border-radius: 4px;
            position: relative;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #18A686;
            border-color: #18A686;
        }

        .form-check-input:checked::before {
            content: '';
            font-size: 14px;
            color: white;
            position: absolute;
            top: 0;
            left: 3px;
        }

        .form-control:focus {
            outline: none;
            border: 2px solid #18A686;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf <!-- CSRF Token for security -->

            <!-- Username -->
            <div class="form-group">
                <h5>Username</h5>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="username" placeholder="Enter your name" value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <h5>Email</h5>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="username" placeholder="Enter your email" value="{{ old('email') }}">

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <h5>Password</h5>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" placeholder="Enter your password">

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <h5>Password confarmation</h5>
                <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"
                    id="password" placeholder="Enter your password">

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me Checkbox -->
            <div class="form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="rememberMe"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-custom mt-3">Login</button>
        </form>
    </div>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>

@endsection