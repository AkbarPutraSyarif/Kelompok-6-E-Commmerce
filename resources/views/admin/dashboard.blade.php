<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <form action="{{ url('admin/addProduct') }}" method="POST">
        @csrf
        <div>
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="price">Product Price:</label>
            <input type="number" name="price" id="price" required>
        </div>
        <div>
            <label for="description">Product Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <button type="submit">Add Product</button>
    </form>
    <br>
    <a href="{{ url('/') }}">Logout</a>
</body>
</html>
