<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase - {{ $product['name'] }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">E-commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/' . $product['image']) }}" class="img-fluid" alt="{{ $product['name'] }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $product['name'] }}</h2>
<<<<<<< HEAD
<<<<<<< HEAD
                <p>Harga : Rp {{ number_format($product['harga'], 0, ',', '.') }}</p>
                <form action="{{ route('checkout.store') }}" method="POST">
<<<<<<< HEAD
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <button type="submit" class="btn btn-primary">Konfirmasi Pembelian</button>
=======
                <p>Harga: Rp {{ number_format($product['harga'], 0, ',', '.') }}</p>
=======
                <p>Harga : Rp {{ number_format($product['harga'], 0, ',', '.') }}</p>
>>>>>>> 80a0e84 (Membuat Beranda dan Database Product)
                <form action="/order" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <button type="submit" class="btn btn-success">Confirm Purchase</button>
>>>>>>> 55fe1ff (Membuat Direct namun belum jadi)
=======
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <button type="submit" class="btn btn-primary">Konfirmasi Pembelian</button>
>>>>>>> 5f9760f (Nambahin checkout product dan layout product)
                </form>
            </div>
        </div>
    </div>
    <footer class="bg-light text-center py-4 mt-5">
        <p>&copy; 2024 E-commerce. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<<<<<<< HEAD
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 55fe1ff (Membuat Direct namun belum jadi)
=======
</html>
>>>>>>> 5f9760f (Nambahin checkout product dan layout product)
