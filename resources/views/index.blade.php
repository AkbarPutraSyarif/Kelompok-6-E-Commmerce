@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    @if (Auth::user()->is_admin)
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    @endif
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-info">View</a>
                    @if (Auth::user()->is_admin)
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
