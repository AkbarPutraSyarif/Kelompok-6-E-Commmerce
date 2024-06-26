<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <h1>Admin Dashboard</h1>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if(session('delete'))
        <div class="alert-danger">
            {{ session('delete') }}
        </div>
    @endif

    <h2>Product List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->harga }}</td> <!-- Display price -->
                    <td>{{ $product->stock }}</td>
                    <td>
                        <form class="form-inline" action="{{ route('admin.updateStock', $product->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="increment" required>
                            <button type="submit">Update Stock</button>
                        </form>
                        <form class="form-inline" action="{{ route('admin.price', $product->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="harga" required>
                            <button type="submit">Update Price</button>
                        </form>
                        
                        <form class="form-inline" action="{{ route('admin.deleteProduct', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <div class="button-container">
        <a class="logout" href="{{ url('/loginadmin') }}">Logout</a>
        <a class="beranda" href="{{ url('/home') }}">Beranda</a>
        <a class="buatproduk" href="{{ url('/buatproduk') }}">BuatProduk</a>
        <a class="account" href="{{ route('admin.account') }}">ManageAcc</a>
    </div>
</body>
</html>

