<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - E-commerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @if (session()->has('success_message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success_message') }}
        @if (session()->has('user_balance'))
        <p>Your remaining balance is: Rp {{ number_format(session()->get('user_balance'), 0, ',', '.') }}</p>
        @endif
    </div>
    @endif

    @if (Cookie::has('user_balance'))
    <div class="alert alert-info" role="alert">
        <p>Your remaining balance from cookie is: Rp {{ number_format(Cookie::get('user_balance'), 0, ',', '.') }}</p>
    </div>
    @endif

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">E-commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('products.all') }}>Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('topup.update') }}>Top Up</a>
                </li>
            </ul>
        </div>
    </nav>
    <header class="text-center">
        <h1 class="display-4">Welcome to Our E-commerce Site</h1>
        <p class="lead">Find the best products here.</p> 
        <a class="btn btn-primary btn-lg" href={{ route('products.all') }} role="button">Shop Now</a>
    </header>
    <footer class="bg-light text-center py-4">
        <p>&copy; 2024 E-commerce. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>