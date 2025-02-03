<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <img src="{{ Auth::user()->avatar }}" loading="lazy" alt="Profile Picture" class="rounded-circle mt-3" width="150">
        <p class="mt-3">{{ Auth::user()->email }}</p>
        <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
